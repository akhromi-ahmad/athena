# --- Stage 1: Build Assets ---
FROM node:20-alpine AS assets-builder
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# --- Stage 2: Production Image ---
FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    nginx \
    supervisor \
    && ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy composer files and install dependencies
COPY composer.json composer.lock ./
RUN composer install --optimize-autoloader --no-dev --ignore-platform-reqs --no-scripts

# Copy project files
COPY . .

# Copy compiled Vite assets from builder stage
COPY --from=assets-builder /app/public/build ./public/build

# Run autoload and package discovery
RUN composer dump-autoload --optimize && php artisan package:discover --ansi

# --- Generate Nginx configuration dynamically ---
RUN echo 'server {' > /etc/nginx/sites-available/default && \
    echo '    listen 8080 default_server;' >> /etc/nginx/sites-available/default && \
    echo '    listen [::]:8080 default_server;' >> /etc/nginx/sites-available/default && \
    echo '    root /var/www/public;' >> /etc/nginx/sites-available/default && \
    echo '    index index.php index.html;' >> /etc/nginx/sites-available/default && \
    echo '    server_name _;' >> /etc/nginx/sites-available/default && \
    echo '    charset utf-8;' >> /etc/nginx/sites-available/default && \
    echo '    location / {' >> /etc/nginx/sites-available/default && \
    echo '        try_files $uri $uri/ /index.php?$query_string;' >> /etc/nginx/sites-available/default && \
    echo '    }' >> /etc/nginx/sites-available/default && \
    echo '    location = /favicon.ico { access_log off; log_not_found off; }' >> /etc/nginx/sites-available/default && \
    echo '    location = /robots.txt  { access_log off; log_not_found off; }' >> /etc/nginx/sites-available/default && \
    echo '    error_page 404 /index.php;' >> /etc/nginx/sites-available/default && \
    echo '    location ~ \.php$ {' >> /etc/nginx/sites-available/default && \
    echo '        fastcgi_pass 127.0.0.1:9000;' >> /etc/nginx/sites-available/default && \
    echo '        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;' >> /etc/nginx/sites-available/default && \
    echo '        include fastcgi_params;' >> /etc/nginx/sites-available/default && \
    echo '    }' >> /etc/nginx/sites-available/default && \
    echo '    location ~ /\.(?!well-known).* {' >> /etc/nginx/sites-available/default && \
    echo '        deny all;' >> /etc/nginx/sites-available/default && \
    echo '    }' >> /etc/nginx/sites-available/default && \
    echo '}' >> /etc/nginx/sites-available/default

# --- Generate Supervisor configuration dynamically ---
RUN echo '[supervisord]' > /etc/supervisor/conf.d/supervisord.conf && \
    echo 'nodaemon=true' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo 'logfile=/dev/null' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo 'logfile_maxbytes=0' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo 'pidfile=/var/run/supervisord.pid' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo 'user=root' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo '' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo '[program:php-fpm]' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo 'command=php-fpm' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo 'stdout_logfile=/dev/stdout' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo 'stdout_logfile_maxbytes=0' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo 'stderr_logfile=/dev/stderr' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo 'stderr_logfile_maxbytes=0' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo 'autorestart=true' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo '' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo '[program:nginx]' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo 'command=nginx -g "daemon off;"' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo 'stdout_logfile=/dev/stdout' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo 'stdout_logfile_maxbytes=0' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo 'stderr_logfile=/dev/stderr' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo 'stderr_logfile_maxbytes=0' >> /etc/supervisor/conf.d/supervisord.conf && \
    echo 'autorestart=true' >> /etc/supervisor/conf.d/supervisord.conf

# --- Generate startup script dynamically ---
RUN echo '#!/bin/sh' > /usr/local/bin/start.sh && \
    echo 'if [ -n "$DATABASE_URL" ]; then' >> /usr/local/bin/start.sh && \
    echo '    export DB_URL="$DATABASE_URL"' >> /usr/local/bin/start.sh && \
    echo '    if [ -z "$DB_CONNECTION" ]; then' >> /usr/local/bin/start.sh && \
    echo '        export DB_CONNECTION=pgsql' >> /usr/local/bin/start.sh && \
    echo '    fi' >> /usr/local/bin/start.sh && \
    echo 'fi' >> /usr/local/bin/start.sh && \
    echo 'if [ -n "$PORT" ]; then' >> /usr/local/bin/start.sh && \
    echo '    echo "Configuring Nginx to listen on port $PORT"' >> /usr/local/bin/start.sh && \
    echo '    sed -i "s/listen 8080/listen $PORT/g" /etc/nginx/sites-available/default' >> /usr/local/bin/start.sh && \
    echo 'fi' >> /usr/local/bin/start.sh && \
    echo 'echo "Running database migrations..."' >> /usr/local/bin/start.sh && \
    echo 'php artisan migrate --force' >> /usr/local/bin/start.sh && \
    echo 'echo "Starting Supervisor..."' >> /usr/local/bin/start.sh && \
    echo 'exec supervisord -c /etc/supervisor/conf.d/supervisord.conf' >> /usr/local/bin/start.sh && \
    chmod +x /usr/local/bin/start.sh

# Set permissions
RUN chown -R www-data:www-data /var/www

# Expose dynamic port
EXPOSE 8080

# Run the startup script
CMD ["/usr/local/bin/start.sh"]
