#!/bin/sh
source project.sh
export PROJECT_NAME

docker run -ti -v "$(PWD)":/app composer create-project symfony/skeleton ${PROJECT_NAME}

cd ${PROJECT_NAME}/

## prerequisites
docker run -ti -v "$(PWD)":/app composer require sensio/framework-extra-bundle
docker run -ti -v "$(PWD)":/app composer require symfony/maker-bundle
docker run -ti -v "$(PWD)":/app composer require annotations
docker run -ti -v "$(PWD)":/app composer require symfony/orm-pack
docker run -ti -v "$(PWD)":/app composer require symfony/expression-language

docker run -ti -v "$(PWD)":/app composer install

#docker network create tech-demo-network