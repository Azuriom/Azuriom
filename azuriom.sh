#!/bin/sh

# Check if .env file exists
if [ ! -f .env ]; then
    echo "The .env file does not exist at the root of the project. You must copy .env.example to .env and modify the database values for the script to execute correctly."
    exit 1
fi

ARCH=$(uname -m)

# shellcheck disable=SC2039
if [[ "$ARCH" == "arm64" ]]; then
    NODE_IMAGE="arm64v8/node:18"
    COMPOSER_IMAGE="arm64v8/composer"
    DOCKER_COMPOSE_FILE="docker-compose-arm.yml"
else
    NODE_IMAGE="node:18"
    COMPOSER_IMAGE="composer"
    DOCKER_COMPOSE_FILE="docker-compose.yml"
fi

SCRIPT=$(realpath "$0")
SCRIPT_DIR=$(dirname "$SCRIPT")

cd "${SCRIPT_DIR}" || exit

case $1 in
  "build")
    bash "$0" composer-install
    bash "$0" npm-install
    bash "$0" npm-run-prod
    bash "$0" laravel-symlink
    docker-compose -f $DOCKER_COMPOSE_FILE build
    exit
    ;;

  "start")
    docker-compose -f $DOCKER_COMPOSE_FILE up -d
    exit
    ;;

  "stop")
    docker-compose -f $DOCKER_COMPOSE_FILE stop
    exit
    ;;

  "docker-compose-build")
    docker-compose -f $DOCKER_COMPOSE_FILE build
    exit
    ;;

  "npm-install")
    docker run -it --rm -v "${SCRIPT_DIR}":/usr/src/app -w /usr/src/app $NODE_IMAGE npm ci
    exit
    ;;

  "npm-run-prod")
    docker run -it --rm -v "${SCRIPT_DIR}":/usr/src/app -w /usr/src/app $NODE_IMAGE npm run prod
    exit
    ;;

  "composer-install")
    docker run --rm --interactive --tty --volume "${SCRIPT_DIR}":/app $COMPOSER_IMAGE install
    exit
    ;;

  "laravel-generate-key")
    docker-compose -f $DOCKER_COMPOSE_FILE exec php-fpm php artisan key:generate
    exit
    ;;

  "laravel-init-db")
    docker-compose -f $DOCKER_COMPOSE_FILE exec php-fpm php artisan migrate --seed
    exit
    ;;

  "laravel-migrate")
    docker-compose -f $DOCKER_COMPOSE_FILE exec php-fpm php artisan migrate
    exit
    ;;

  "laravel-symlink")
    docker-compose -f $DOCKER_COMPOSE_FILE exec php-fpm php artisan storage:link
    exit
    ;;

  "laravel-create-admin")
    docker-compose -f $DOCKER_COMPOSE_FILE exec php-fpm php artisan user:create --admin
    exit
    ;;

  "laravel-clear-cache")
    docker-compose -f $DOCKER_COMPOSE_FILE exec php-fpm php artisan cache:clear
    exit
    ;;

  "artisan")
    shift
    docker-compose -f $DOCKER_COMPOSE_FILE exec php-fpm php artisan "$*"
    exit
    ;;

esac

# Display Help
echo "Manage Azuriom using docker and docker-compose. See https://github.com/Azuriom/Azuriom/blob/master/docker/INSTALL.md"
echo
echo "Usage: ./azuriom.sh COMMAND [arguments]"
echo
echo "Commands:"
echo "   build                      Build the whole application."
echo "   start                      Start containers (require the whole application to be built)"
echo "   stop                       Stop containers"
echo "   docker-compose-build       Build containers"
echo "   npm-install                Install npm dependencies"
echo "   npm-run-prod               Compile assets (require npm dependencies to be installed)"
echo "   composer-install           Install composer dependencies"
echo "   laravel-generate-key       Generate laravel APP_KEY in .env file (used by laravel for data encryption)"
echo "   laravel-init-db            Initiate database"
echo "   laravel-migrate            Run migration (mostly used when updating to insert database changes)"
echo "   laravel-symlink            Create a symlink (create a symlink public/storage -> storage/app/public)"
echo "   laravel-create-admin       Create an admin user through CLI"
echo "   laravel-clear-cache        Clear laravel cache"
echo "   artisan <commands>         Run any artisan command (e.g. ./azuriom artisan cache:clear)"
