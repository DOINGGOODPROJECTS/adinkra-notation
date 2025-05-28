FROM php:8.2-apache

# Installe les extensions nécessaires
RUN apt-get update && apt-get install -y \
    zip unzip git curl libzip-dev libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo_mysql mbstring exif pcntl bcmath

# Active mod_rewrite
RUN a2enmod rewrite

# Copier tous les fichiers dans /var/www/html
COPY . /var/www/html

# NE PAS redéfinir APACHE_DOCUMENT_ROOT ici
# Apache servira depuis /var/www/html directement

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

EXPOSE 80
