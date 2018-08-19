#!/bin/sh
source project.sh
export PROJECT_NAME

# --network <NETWORK_NAME>
#   the network the container will run on
#
# -ti
#   t - tty output
#   i - interactive input
#
# -p HOST:CONTAINER
#   expose CONTAINER port as HOST port
#
# --rm
#   clean-up named container on exit
#
# -v HOST:CONTAINER
#   map HOST directory into CONTAINER directory
#   "$(PWD)" -- macro to print current directory
#
# --name NAME
#   gives the container a name

## Check For Volume mounting if you don't see changes
docker run --network tech-demo-network -ti -p 8080:80 --rm -v "$(PWD)/${PROJECT_NAME}":/webapp -v "$(PWD)/run/secrets":/run/secrets --name ${PROJECT_NAME} ${PROJECT_NAME}
#docker run -ti -p 8080:80 --rm --name dice-demo dice-demo
