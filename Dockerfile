FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql bcmath zip \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/azuriom

COPY . /var/www/azuriom

COPY .env.example /var/www/azuriom/.env

COPY --chown=www-data:www-data . /var/www/azuriom

EXPOSE 9000

CMD ["php-fpm"]
