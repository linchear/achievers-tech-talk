#!/bin/sh

#docker run -ti -p 8080:80 --rm -v "$(PWD)/tech_demo":/webapp -v "$(PWD)/run/secrets":/run/secrets --name tech_demo tech_demo
docker run -ti -p 8080:80 --rm --name tech_demo tech_demo
