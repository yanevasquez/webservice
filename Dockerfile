FROM php:7.3-fpm-alpine

COPY ./src/ /var/www

WORKDIR /var/www

RUN apk update && apk add mysql-client zip libzip-dev

RUN docker-php-ext-install pdo pdo_mysql zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer