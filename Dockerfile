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

# Установка Node.js и npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Установка Composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm composer-setup.php

# Настройка прав доступа и выполнение обновления зависимостей Composer
RUN mkdir -p /var/www/azuriom && \
    chown -R www-data:www-data /var/www/azuriom && \
    chmod -R 755 /var/www/azuriom

# Копирование конфигурации Nginx
COPY nginx.conf /etc/nginx/sites-available/default

# Указание на рабочую директорию
WORKDIR /var/www/azuriom
