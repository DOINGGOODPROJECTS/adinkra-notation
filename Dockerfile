FROM php:8.2-apache

# Install PHP extensions and system tools
RUN apt-get update && apt-get install -y \
    zip unzip curl libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy existing application
COPY . .

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Expose port
EXPOSE 80
