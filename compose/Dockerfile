FROM hacklab/mapasculturais:7.0.0-RC

COPY compose/common/config.d /var/www/config/common.d
COPY compose/production/config.d /var/www/config/prod.d

COPY themes /var/www/src/themes
COPY plugins /var/www/src/plugins

WORKDIR /var/www/src
RUN pnpm install --recursive && pnpm run build 
WORKDIR /var/www/html