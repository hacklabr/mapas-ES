#!/bin/bash
docker pull mapasculturais/mapasculturais:develop

git pull

git submodule update

docker-compose -f docker-compose.prod.yml build --no-cache

./stop.sh
./start.sh
