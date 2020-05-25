FROM php:apache

LABEL maintainer="97carmine"

ARG develop

ENV DEBIAN_FRONTEND noninteractive

ADD apache.conf /etc/apache2/sites-available/000-default.conf

RUN apt-get update \
    && apt upgrade -y \
    && apt install --no-install-recommends --no-install-suggests locales-all -y \
    && docker-php-ext-install gettext \
    && a2enmod ssl \
    && a2enmod rewrite  \
    && if [ "$develop" = "yes" ]; then \
        pecl install xdebug-2.9.5 \
        && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.default_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.remote_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.remote_connect_back=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.idekey=docker" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.profiler_enable=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.remote_log='/tmp/xdebug.log'" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.cli_color=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.profiler_append=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && docker-php-ext-enable xdebug \
    ; else \
        curl -L https://github.com/97carmine/cv-ar/archive/master.tar.gz  | tar zxf - \
        && mv -v ./CV-AR-master/locale ./CV-AR-master/src ./CV-AR-master/resources ./ \
        && rm -r ./CV-AR-master \
    ; fi \
    && apt-get clean autoclean -y \
    && apt-get autoremove -y \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /etc/apache2/sites-available/default-ssl.conf

VOLUME /config
