.PHONY: run run-with-logs stop build run-build run-build-with-logs generate-key init-db symlink create-user create-admin artisan

run:
	docker-compose up -d

run-with-logs:
	docker-compose up

stop:
	docker-compose down

build:
	docker-compose build

run-build:
	docker-compose up -d --build

run-build-with-logs:
	docker-compose up --build

generate-key:
	docker-compose exec php-fpm php artisan key:generate

init-db:
	docker-compose exec php-fpm php artisan migrate --seed

symlink:
	docker-compose exec php-fpm php artisan storage:link

create-user:
	docker-compose exec php-fpm php artisan user:create

create-admin:
	docker-compose exec php-fpm php artisan user:create --admin

artisan:
	docker-compose exec php-fpm php artisan $(CMD)

