#!/bin/sh

SCRIPT=$(realpath "$0")
SCRIPT_DIR=$(dirname "$SCRIPT")

cd "${SCRIPT_DIR}" || exit

case $1 in

  "build")
    bash "$0" composer-install
    bash "$0" npm-install
    bash "$0" npm-run-prod
    bash "$0" npm-run-prod
    bash "$0" laravel-symlink
    docker-compose build
    ;;

  "start")
    docker-compose up -d
    ;;

  "stop")
    docker-compose stop
    ;;

  "docker-compose-build")
    docker-compose build
    ;;

  "npm-install")
    docker run -it --rm -v "${SCRIPT_DIR}":/usr/src/app -w /usr/src/app  node:12 npm ci
    ;;

  "npm-run-prod")
    docker run -it --rm -v "${SCRIPT_DIR}":/usr/src/app -w /usr/src/app  node:12 npm run prod
    ;;

  "composer-install")
    docker run --rm --interactive --tty --volume "${SCRIPT_DIR}":/app composer install
    ;;

  "laravel-generate-key")
    docker-compose exec php-fpm php artisan key:generate
    ;;

  "laravel-init-db")
    docker-compose exec php-fpm php artisan migrate --seed
    ;;

  "laravel-migrate")
    docker-compose exec php-fpm php artisan migrate
    ;;

  "laravel-symlink")
    docker-compose exec php-fpm php artisan storage:link
    ;;

  "laravel-create-admin")
    docker-compose exec php-fpm php artisan user:create --admin
    ;;

  "laravel-clear-cache")
    docker-compose exec php-fpm php artisan cache:clear
    ;;

  "artisan")
    shift
    docker-compose exec php-fpm php artisan "$*"
    ;;

esac
