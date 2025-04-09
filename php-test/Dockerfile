FROM quay.io/hellofresh/php70:7.1

# Adds nginx configurations
ADD ./docker/nginx/default.conf   /etc/nginx/sites-available/default

# Environment variables to PHP-FPM
RUN sed -i -e "s/;clear_env\s*=\s*no/clear_env = no/g" /etc/php/7.1/fpm/pool.d/www.conf

# Set apps home directory.
ENV APP_DIR /server/http

# Adds the application code to the image
ADD . ${APP_DIR}

# Define current working directory.
WORKDIR ${APP_DIR}

# Cleanup
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

EXPOSE 80

FROM php:7.4-apache

RUN apt-get update && \
    apt-get install -y libpq-dev zip unzip && \
    docker-php-ext-install pdo pdo_pgsql

RUN a2enmod rewrite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf