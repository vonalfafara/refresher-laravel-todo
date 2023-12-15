FROM richarvey/nginx-php-fpm:3.1.4

COPY . .

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV DB_CONNECTION pgsql
ENV DB_HOST dpg-clu3udi1hbls73e9bhm0-a
ENV DB_PORT 5432
ENV DB_DATABASE todo_db_hl1q
ENV DB_USERNAME root
ENV DB_PASSWORD MHlMYA0jkoVTYUehHBzaGpadhtgLq34g

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]