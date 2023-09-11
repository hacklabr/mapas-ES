#!/bin/bash
echo "atualizando ambiente em:" $(date)
git pull
./stop.sh
./start.sh
