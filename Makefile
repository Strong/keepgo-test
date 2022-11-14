#!make

DOCKER_DIR=./docker

$(shell cp -n ${DOCKER_DIR}/.env.example ${DOCKER_DIR}/.env)
$(shell cp -n ${DOCKER_DIR}/image/mysql/docker-entrypoint-initdb.d/createdb.sql.example ${DOCKER_DIR}/image/mysql/docker-entrypoint-initdb.d/createdb.sql)

include ${DOCKER_DIR}/.env

DC=docker-compose --project-directory ${DOCKER_DIR} --file ${DOCKER_DIR}/docker-compose.yml --file ${DOCKER_DIR}/docker-compose.override.yml

workspace:
	@$(DC) exec -u laradock workspace bash || true

php:
	@$(DC) exec php-fpm bash || true

mysql:
	@$(DC) exec mysql bash || true

start:
	$(DC) up -d nginx php-fpm mysql workspace

stop:
	$(DC) down

restart: stop start
