FROM hacklab/mapasculturais:redesign

COPY compose/common/config.php /var/www/html/protected/application/conf/config.php
COPY compose/common/config.d /var/www/html/protected/application/conf/conf-common.d
COPY compose/production/config.d /var/www/html/protected/application/conf/config.d

COPY themes /var/www/html/protected/application/themes
COPY plugins /var/www/html/protected/application/plugins

COPY compose/common/php-ini.d /usr/local/etc/php/conf.d

COPY compose/common/branchMap.csv /var/www/html/protected/application/plugins/AldirBlanc/CSV/branchMap.csv

workdir /var/www/html/protected
RUN pnpm install --recursive && pnpm run build 
workdir /var/www/html