FROM mapasculturais/mapasculturais:develop-cli

RUN git clone https://github.com/mapasculturais/plugin-MultipleLocalAuth /var/www/html/protected/application/plugins/MultipleLocalAuth
RUN curl https://raw.githubusercontent.com/opauth/facebook/master/FacebookStrategy.php > /var/www/html/protected/application/plugins/MultipleLocalAuth/Facebook/FacebookStrategy.php

COPY compose/common/config.php /var/www/html/protected/application/conf/config.php