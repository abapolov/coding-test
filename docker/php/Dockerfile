FROM php:7.2-fpm

# Needed for docker building on Ubuntu (keyboard layout auto config)
# Installation of wkhtmlto*
RUN apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y keyboard-configuration build-essential xorg libssl-dev libxrender-dev wget gdebi git mariadb-client \
    && wget https://downloads.wkhtmltopdf.org/0.12/0.12.5/wkhtmltox_0.12.5-1.stretch_amd64.deb \
    && dpkg -i wkhtmltox_0.12.5-1.stretch_amd64.deb \
    && apt-get install

# Installation of PHP extensions
RUN apt-get install -y zlib1g-dev libpng-dev libjpeg-dev libicu-dev libfreetype6-dev g++ \
    && docker-php-ext-install pdo_mysql \
    && pecl install apcu-5.1.8 \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install zip \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd

# Composer installation
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php --filename=composer \
    && php -r "unlink('composer-setup.php');" \
    && mv composer /usr/local/bin/composer

WORKDIR /usr/src/app

RUN PATH=$PATH:/usr/src/apps/vendor/bin:bin