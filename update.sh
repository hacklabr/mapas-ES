#!/bin/bash
docker pull hacklab/mapasculturais:v5.2
git pull

git submodule update

docker-compose -f docker-compose.prod.yml build --no-cache

docker-compose -f docker-compose.prod.yml stop mapasculturais
docker-compose -f docker-compose.prod.yml start mapasculturais
