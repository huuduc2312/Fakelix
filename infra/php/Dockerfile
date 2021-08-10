ARG PHP_VERSION=7.4
ARG NGINX_VERSION=2

FROM php:${PHP_VERSION}-fpm-alpine AS php_base

RUN apk add --no-cache \
    shadow \
    yarn \
    ;

RUN docker-php-ext-install mysqli pdo pdo_mysql
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ARG UID=1000
ARG GID=1000

RUN usermod -u $UID www-data && groupmod -g $GID www-data; \
    mkdir /srv/app && chown www-data:www-data /srv/app

WORKDIR /srv/app

EXPOSE 9000
CMD ["php-fpm"]
