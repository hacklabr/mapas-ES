#!/bin/bash
echo "atualizando ambiente em:" $(date)
git pull

git submodule update

docker-compose -f docker-compose.prod.yml build --no-cache --pull

./stop.sh
./start.sh
