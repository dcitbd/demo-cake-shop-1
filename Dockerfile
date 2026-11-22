FROM php:8.2-apache

RUN apt-get update && apt-get install -y libsqlite3-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_sqlite gd \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY . /var/www/html/

RUN mkdir -p /var/www/html/storage /var/www/html/storage/emails /var/www/html/assets/images/uploads \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/assets/images/uploads

EXPOSE 80
