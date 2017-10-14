FROM php:7.0-fpm

ENV MAX_UPLOAD 128M
ENV PHP_MAX_FILE_UPLOAD 128M
ENV PHP_MAX_POST 128M

RUN apt-get update

# Install mbstring
RUN docker-php-ext-install mbstring

# Install mcrypt
RUN apt-get install --no-install-recommends -y libmcrypt-dev
RUN docker-php-ext-install mcrypt

# Install intl
RUN apt-get install --no-install-recommends -y libicu-dev \
  && docker-php-ext-configure intl \
  && docker-php-ext-install intl

# Install gd
RUN apt-get install --no-install-recommends -y libfreetype6-dev libjpeg62-turbo-dev libpng12-dev
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install gd

# Install zip
RUN docker-php-ext-install zip

# Install pdo_pgsql
RUN apt-get update && apt-get install --no-install-recommends -y libpq-dev
RUN docker-php-ext-install pdo_pgsql

# Install pdo_mysql
RUN docker-php-ext-install pdo_mysql

# Install opcache
RUN docker-php-ext-enable opcache

# Install xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Install git mc
RUN apt-get install --no-install-recommends -y git mc htop

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Yii bash_completion
RUN apt-get install --no-install-recommends -y bash-completion
RUN curl -L https://raw.githubusercontent.com/yiisoft/yii2/master/contrib/completion/bash/yii -o /etc/bash_completion.d/yii

# Clean repository
RUN apt-get clean \
    && rm -rf /var/lib/apt/lists/*

ARG PHP_CLI_GID
ARG PHP_CLI_UID
ARG PHP_FPM_GID
ARG PHP_FPM_UID

RUN groupadd -g $PHP_CLI_GID php && useradd -u $PHP_CLI_GID -g php -m php

RUN if [ ${PHP_FPM_UID} = ${PHP_CLI_UID} ]; then \
    echo 'user = php' >> /usr/local/etc/php-fpm.d/zz-docker.conf \
    && echo 'group = php' >> /usr/local/etc/php-fpm.d/zz-docker.conf \
;else \
    groupadd -g $PHP_FPM_GID php-fpm && useradd -u $PHP_FPM_UID -g php-fpm -m php-fpm \
    && echo 'user = php-fpm' >> /usr/local/etc/php-fpm.d/zz-docker.conf \
    && echo 'group = php-fpm' >> /usr/local/etc/php-fpm.d/zz-docker.conf \
;fi

WORKDIR /app
