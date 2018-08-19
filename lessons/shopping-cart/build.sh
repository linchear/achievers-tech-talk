#!/bin/sh
source project.sh
export PROJECT_NAME
echo building $PROJECT_NAME
docker build . -t ${PROJECT_NAME}:latest --build-arg PROJECT_NAME=$PROJECT_NAME
