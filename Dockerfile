FROM php:7.4-fpm-alpine3.14

RUN apk add oniguruma-dev postgresql-dev libxml2-dev
RUN docker-php-ext-install \
        bcmath \
        ctype \
        fileinfo \
        json \
        mbstring \
        pdo_mysql \
        pdo_pgsql \
        tokenizer \
        xml

# Copy Composer binary from the Composer official Docker image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV WEB_DOCUMENT_ROOT /var/www/public
# ENV APP_ENV production
WORKDIR /var/www
COPY src .

RUN composer install --no-dev
RUN php artisan key:generate
RUN php artisan config:clear
RUN php artisan cache:clear

RUN chown -R www-data:www-data /var/www