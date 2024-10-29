FROM ubuntu:22.04
EXPOSE 80 443

# Установка основных пакетов и зависимостей
RUN apt update -y && \
    DEBIAN_FRONTEND=noninteractive apt upgrade -y && \
    DEBIAN_FRONTEND=noninteractive apt install -y nginx zip curl lsb-release apt-transport-https ca-certificates software-properties-common

# Добавление репозитория PHP
RUN add-apt-repository ppa:ondrej/php -y && \
    apt-get update -y

# Обновление пакетов и установка PHP расширений
RUN DEBIAN_FRONTEND=noninteractive apt-get update -y && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y php8.2-cli php8.2-mysql php8.2-pgsql php8.2-sqlite3 php8.2-bcmath php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip php8.2-gd php8.2-fpm

# Installation  Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Installation Composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm composer-setup.php

# Create working folder
RUN mkdir -p /var/www/azuriom
COPY nginx.conf /etc/nginx/sites-available/default
COPY . /var/www/azuriom

WORKDIR /var/www/azuriom

RUN npm install && \
    npm run production && \
    composer install

RUN chmod 755 /var/www/azuriom && \
    chmod -R 755 /var/www/azuriom/plugins && \
    chmod -R 755 /var/www/azuriom/plugins && \
    chmod -R 755 /var/www/azuriom/resources && \
    chmod -R 755 /var/www/azuriom/storage

CMD service php8.2-fpm start && nginx -g 'daemon off;'
