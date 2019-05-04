.DEFAULT_GOAL := help

## GENERAL ##
OWNER 						= web
SERVICE_NAME 				= school
VERSION         			= v1
PROVIDER					= ronaldgcr
DOCKER_NETWORK				?= --network api_reserva 
## DEV ##
TAG_DEV						= 0.0.1
TAG_MYSQL 					= mysql
MYSQL_USER					?= root
MYSQL_ROOT_PASSWORD			?= 1234
MYSQL_DATABASE				?= web_colegio
USER_ID  					?= $(shell id -u)
GROUP_ID 					?= $(shell id -g)

## DEPLOY ##
ENV 						?= dev
BUILD_NUMBER 				?= 000001
BUILD_TIMESTAMP 			?= 20181005
DEPLOY_REGION 				?= eu-west-1
ACCOUNT_ID					?= 929226109038
DESIRED_COUNT 				?= 1
MIN_SCALING					?= 1
MAX_SCALING					?= 2
MEMORY_SIZE 				?= 512
CONTAINER_PORT 				?= 80
INFRA_BUCKET 				?= infraestructura.dev

## RESULT_VARS ##
PROJECT_NAME			    = $(OWNER)-$(ENV)-$(SERVICE_NAME)
IMAGE_DEPLOY			    = $(PROVIDER)/$(PROJECT_NAME):$(TAG_DEV)

## VARIABLES FOR LOCAL BALANCER, 'SPRING CONFIG OR ENV VARS' ##
VIRTUAL_HOST				= $(PROJECT_NAME)/$(VERSION)

## DEFAULT ##
NETWORD					    ?= orbis-training-$(PROJECT_NAME)
PATH_CORE					?= $(PWD)/core

build: ## construccion de la imagen: make build
	docker build -f docker/php/Dockerfile -t $(IMAGE_DEPLOY) docker/php/;

install: ## install de paquetes
	make tast EXECUTE="install";
	sudo chmod -R 777 app/*;

tast: ## installar: make tast EXECUTE=install
	docker run -it -v "$(PWD)/app:/app" -w "/app" $(IMAGE_DEPLOY) composer $(EXECUTE)

mysql: ## construir mysql
	docker run -p 3306:3306 --name $(TAG_MYSQL) -v $(PWD)/docker/mysql/sql:/docker-entrypoint-initdb.d -e MYSQL_ROOT_PASSWORD=$(MYSQL_ROOT_PASSWORD) -e MYSQL_USER=$(MYSQL_USER) -e MYSQL_DATABASE=$(MYSQL_DATABASE) -d mysql:5.5;

start: ## inicializar proyecto: make login
	docker run -it -p 8000:8000 -v "$(PWD)/app:/app" -w "/app"  $(IMAGE_DEPLOY) php bin/console server:start 0.0.0.0:8000

ssh: ## inicializar proyecto: make migration
	docker run -it -v "$(PWD)/app:/app" -w "/app" $(IMAGE_DEPLOY) bash

stop: ## inicializar proyecto: make migration
	docker rm $(docker ps -a -q)

up: ## inicialiar mysql y applicacion
	@IMAGE_DEPLOY=$(IMAGE_DEPLOY) \
	PROJECT_NAME=$(PROJECT_NAME) \
	VIRTUAL_HOST=$(VIRTUAL_HOST) \
	docker-compose -p $(PROJECT_NAME) up

console: ## inicialiar mysql y applicacion
	@IMAGE_DEPLOY=$(IMAGE_DEPLOY) \
	PROJECT_NAME=$(PROJECT_NAME) \
	VIRTUAL_HOST=$(VIRTUAL_HOST) \
	docker-compose -p $(PROJECT_NAME) exec backend bash

login: ## login de docker: make login
	@docker login

push: ## Subir imagen al dockerhub: make push
	@make login
	@docker push $(IMAGE_DEPLOY)

help: ## ayuda: make help
	@printf "\033[31m%-16s %-59s %s\033[0m\n" "Target" "Help" "Usage"; \
	printf "\033[31m%-16s %-59s %s\033[0m\n" "------" "----" "-----"; \
	grep -hE '^\S+:.*## .*$$' $(MAKEFILE_LIST) | sed -e 's/:.*##\s*/:/' | sort | awk 'BEGIN {FS = ":"}; {printf "\033[32m%-16s\033[0m %-58s \033[34m%s\033[0m\n", $$1, $$2, $$3}'
