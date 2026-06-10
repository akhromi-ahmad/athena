FROM php:8.3-fpm

# 1. Install dependencies (Termasuk library untuk PostgreSQL jika dibutuhkan)
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev \
    libxml2-dev libpq-dev nginx supervisor

# 2. Install PHP extensions yang dibutuhkan Laravel
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# 3. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# 4. Copy konfigurasi project terlebih dahulu (untuk optimasi cache Docker)
COPY composer.json composer.lock ./

# 5. Gunakan 'install' dengan ignore-platform-reqs agar aman dari konflik versi PHP
RUN composer install --optimize-autoloader --no-dev --ignore-platform-reqs --no-scripts

# 6. Copy seluruh sisa file project
COPY . .

# 6.5. Run Composer scripts now that all project files (including artisan) are present
RUN composer dump-autoload --optimize && php artisan package:discover --ansi

# 7. Atur permissions folder storage dan cache agar Laravel bisa menulis file log/session
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 8000

# Jika Anda belum mengonfigurasi Supervisor/Nginx, perintah di bawah ini tetap bisa digunakan di Railway untuk sementara waktu:
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
