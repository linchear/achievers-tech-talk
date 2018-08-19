#!/bin/sh

docker run --network tech-demo-network -p 13306:3306 --rm --name tech-mysql -e MYSQL_ROOT_PASSWORD=secret -d mysql:5.7
