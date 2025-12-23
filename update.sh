#!/bin/bash
echo "atualizando ambiente em:" $(date)
git pull
git submodule update

docker-compose -f docker-compose.prod.yml build --no-cache --pull mapasculturais

./stop.sh
./start.sh
