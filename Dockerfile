FROM php:8.2-apache

# Installe les dépendances système
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo_mysql mbstring exif pcntl bcmath

# Active mod_rewrite d’Apache
RUN a2enmod rewrite

# Définir le dossier de travail
WORKDIR /var/www/html

# Copier les fichiers du projet
COPY . .

# Mettre les bonnes permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Exposer le port HTTP
EXPOSE 80
