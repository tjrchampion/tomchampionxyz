FROM php:7.2-fpm

RUN apt-get update && \
     apt-get install -y \
         zlib1g-dev \
         libmcrypt-dev \
         && docker-php-ext-install zip pdo_mysql

RUN pecl install xdebug-2.6.0alpha1

COPY xdebug.ini /etc/php/7.2/apache2/conf.d/20-xdebug.ini