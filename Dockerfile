FROM php:8.2-apache

# Installe les dépendances système nécessaires
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql mbstring exif pcntl bcmath

# Active mod_rewrite d’Apache
RUN a2enmod rewrite

# Définit le dossier de travail
WORKDIR /var/www/html

# Copie les fichiers de l'application
COPY . .

# Permissions sur le stockage
RUN chown -R www-data:www-data storage bootstrap/cache

# Installe Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Expose le port web
EXPOSE 80
