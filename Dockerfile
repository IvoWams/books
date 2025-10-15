FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
        git unzip libicu-dev libzip-dev libpq-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo pdo_mysql zip \
    && docker-php-ext-enable intl \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY composer.json composer.lock ./
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html

ARG APP_ENV=prod

RUN if [ "$APP_ENV" = "prod" ]; then \
      composer install --no-dev --no-scripts --no-interaction --optimize-autoloader; \
    else \
      composer install --no-scripts --no-interaction; \
    fi

COPY . .

RUN composer dump-autoload --optimize && \
    php bin/console cache:clear --no-warmup || true

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN chown -R www-data:www-data /var/www/html/var

EXPOSE 80

CMD ["apache2-foreground"]
