#!/bin/bash
git pull

git submodule update

docker-compose -f docker-compose.prod.yml build --no-cache

./stop.sh
./start.sh
