FROM php:8.3-fpm

# 1. Install sistem dependencies yang dibutuhkan (termasuk libpq-dev untuk PostgreSQL)
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
    supervisor

# 2. Install PHP extensions untuk Laravel dan PostgreSQL
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# 3. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Set working directory
WORKDIR /var/www

# 5. Copy file konfigurasi Composer terlebih dahulu untuk optimasi cache Docker
COPY composer.json composer.lock ./

# 6. Install dependensi Laravel secara aman tanpa memicu error versi PHP
RUN composer install --optimize-autoloader --no-dev --ignore-platform-reqs

# 7. Copy seluruh sisa file project ke dalam container
COPY . .

# 8. Berikan hak akses untuk folder storage dan cache agar Laravel bisa menulis log/session
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# 9. Expose port yang akan digunakan oleh aplikasi
EXPOSE 8000

# 10. Jalankan migrasi otomatis ke PostgreSQL Railway, lalu jalankan server Laravel
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
