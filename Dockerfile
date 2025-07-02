# NOTE: Used for Railway deploy only. Laravel Sail ignores this.

# Gunakan PHP 8.4 FPM image
FROM php:8.4-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    libexif-dev \
    unzip \
    git \
    curl \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd exif zip pdo pdo_pgsql

# Install Redis PHP extension
RUN pecl install redis && docker-php-ext-enable redis

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js & npm (for Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install frontend and build Vite assets
RUN npm install && npm run build

# set permission
RUN mkdir -p storage/framework/livewire-tmp \
    && chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# Link storage
RUN php artisan storage:link

# Clear cache
RUN php artisan config:clear

# (Optional) Build frontend assets
# RUN npm install && npm run build

# Start Laravel using Artisan Serve
CMD php artisan serve --host=0.0.0.0 --port=9000 & php artisan queue:work
