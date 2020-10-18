# Basic php-fpm 8.0.0RC2 appserver for Lando
# Based off https://github.com/lando/lando/blob/c0070166bff1714141ae7b7232e8329f068c19cb/plugins/lando-services/services/php/7.4-fpm/Dockerfile

FROM php:8.0.0RC2-fpm-buster

RUN mkdir -p /usr/share/man/man1 /usr/share/man/man7

# Grab needed dependencies to install over dependencies
RUN apt -y update && apt-get install -y \
    gnupg2 \
    wget

# Update sources
RUN echo 'deb http://apt.postgresql.org/pub/repos/apt/ buster-pgdg main' >> /etc/apt/sources.list.d/pgdg.list

# Keys
RUN wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | apt-key add -

# Install all the things
RUN apt-get update && apt-get install -y \
    bzip2 \
    default-mysql-client \
    exiftool \
    git-core \
    imagemagick \
    libbz2-dev \
    libc-client-dev \
    libicu-dev \
    libjpeg62-turbo-dev \
    libkrb5-dev \
    libldap2-dev \
    libmagickwand-dev \
    libmemcached-dev \
    libpng-dev \
    libpq-dev \
    libssl-dev \
    libwebp-dev \
    libxml2-dev \
    libzip-dev \
    libonig-dev \
    openssl \
    postgresql-client-10 \
    pv \
    rsync \
    ssh \
    unzip \
    wget \
    xfonts-75dpi \
    xfonts-base \
    zlib1g-dev

# Install PHP extensions
# RUN pecl install apcu
# RUN pecl install imagick
# RUN pecl install memcached
# RUN pecl install oauth-2.0.4
# RUN pecl install redis-5.1.1
# RUN pecl install xdebug

# Enable PHP extensions
RUN docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/
# RUN docker-php-ext-enable apcu
# RUN docker-php-ext-enable imagick
# RUN docker-php-ext-enable memcached
# RUN docker-php-ext-enable oauth
# RUN docker-php-ext-enable redis
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install bz2
RUN docker-php-ext-install calendar
RUN docker-php-ext-install exif
RUN docker-php-ext-install gettext
RUN docker-php-ext-install intl
RUN docker-php-ext-install ldap
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install opcache
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-install soap
RUN docker-php-ext-install zip

# Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer --version=1.10.1
RUN php -r "unlink('composer-setup.php');"

# Permissions
RUN chsh -s /bin/bash www-data
RUN mkdir -p /var/www/.composer
RUN chown -R www-data:www-data /var/www

# Optimise composer
# Use composer v2
RUN composer self-update --preview
# RUN su -c "composer global require hirak/prestissimo" -s /bin/sh www-data

# No idea...
RUN apt-get -y clean
RUN apt-get -y autoclean
RUN apt-get -y autoremove
RUN rm -rf /var/lib/apt/lists/*
RUN rm -rf
RUN rm -rf /var/lib/cache/*
RUN rm -rf /var/lib/log/*
RUN rm -rf /tmp/*
RUN PHP_OPENSSL=yes docker-php-ext-configure imap --with-kerberos --with-imap-ssl
RUN docker-php-ext-install imap
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install gd
