FROM php:7.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    zlib1g-dev \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libxml2-dev \
    inkscape \
    libmagickwand-dev --no-install-recommends \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd \
    && docker-php-ext-configure soap --enable-soap \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql \
    && docker-php-ext-configure mbstring --enable-mbstring \
    && docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install zip pdo pdo_mysql opcache \
    dom   \
    iconv \
    gd \
    mbstring \
    soap

#COPY ./config/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer --install-dir=/bin


WORKDIR /var/www

ENV APP_HOME /var/www


#change ownership of our applications
RUN chown -R www-data:www-data $APP_HOME


#copy source files and run composer
COPY ./web/ $APP_HOME

# install all PHP dependencies
RUN composer install --no-interaction

#change uid and gid of apache to docker user uid/gid
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

# get install script and pass it to execute: 
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash
# and install node 
RUN apt-get install nodejs