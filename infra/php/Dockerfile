ARG PHP_VERSION=7.4
ARG NGINX_VERSION=2

FROM php:${PHP_VERSION}-fpm-alpine AS php_base

RUN apk add --no-cache \
    shadow \
    yarn \
    ;

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN docker-php-ext-install mysqli pdo pdo_mysql ; \
    chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions imagick

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ARG UID=1000
ARG GID=1000

RUN usermod -u $UID www-data && groupmod -g $GID www-data; \
    mkdir /srv/app && chown www-data:www-data /srv/app

COPY ./infra/php/conf.d/symfony.ini $PHP_INI_DIR/conf.d/symfony.ini

WORKDIR /srv/app

EXPOSE 9000
CMD ["php-fpm"]
