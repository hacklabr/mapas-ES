#!/bin/bash
docker pull mapasculturais/mapasculturais:v5.0.0-RC
git pull

git submodule update

docker-compose -f docker-compose.prod.yml build --no-cache

docker-compose -f docker-compose.prod.yml stop mapasculturais
docker-compose -f docker-compose.prod.yml start mapasculturais