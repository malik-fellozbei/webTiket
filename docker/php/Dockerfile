FROM php:8.4-fpm-alpine

WORKDIR /var/www

RUN apk add --no-cache \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    jpeg-dev \
    freetype-dev \
    oniguruma-dev \
    libxml2-dev \
    curl \
    git \
    icu-dev \
    imagemagick \
    imagemagick-dev;

RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    zip \
    intl;

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd;

RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS autoconf build-base \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && apk del .build-deps;

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

USER www-data

EXPOSE 9000
