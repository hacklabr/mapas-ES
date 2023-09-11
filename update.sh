#!/bin/bash
echo "atualizando ambiente em:" $(date)
git pull
docker-compose -f docker-compose.prod.yml pull mapasculturais
./stop.sh
./start.sh
