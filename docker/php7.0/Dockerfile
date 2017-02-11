FROM ubuntu:16.04

RUN apt-get update && apt-get install -y php7.0-cli php7.0-fpm composer

RUN apt-get update && apt-get install -y \
    php7.0-mbstring \
    php7.0-intl \
    php7.0-gd \
    php7.0-zip \
    php7.0-xml \
    php7.0-pgsql \
    php7.0-mysql \
    php7.0-curl \
    php-pear \
    php7.0-dev

RUN apt-get update && apt-get install -y \
    curl \
    iputils-ping

RUN mkdir /usr/local/etc/php/ \
    && mkdir /usr/local/etc/php/conf.d/ \
    && pecl install -o -f xdebug \
    && rm -rf /tmp/pear \
    && echo "zend_extension=$(find /usr/lib/php/20151012/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && mv /usr/local/etc/php/conf.d/xdebug.ini /etc/php/7.0/mods-available/xdeug.ini \
    && rm -rf /usr/local/etc/php

ADD php-fpm.conf /etc/php/7.0/fpm/php-fpm.conf

ADD scripts/composer-init.sh /

RUN useradd -u 1000 -ms /bin/bash php

ENV HOME=/home/php

ENV OAUTH_TOKEN=f50cf549cc5af78b364a0a1a77d1f5e25df97763

WORKDIR /app

CMD ["bash"]
