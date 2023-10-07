#
# ATTENTION! Dockerfile to use on fly.io test
#
FROM phpdockerio/php:8.2-fpm
WORKDIR "/application"

# install php extensions
RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        git \
        php8.2-mysql \
        php8.2-sqlite \
        php8.2-xdebug;

# install and set up nginx
RUN apt-get install -y nginx
COPY phpdocker/flyio/nginx.conf /etc/nginx/conf.d/default.conf

# copy app to container
COPY . /application
COPY .env.flyio /application/.env

# install php deps
RUN export COMPOSER_ALLOW_SUPERUSER=1; composer install

# crate sqlite database structure
RUN php vendor/bin/doctrine orm:schema-tool:update --force; \
    chmod -R 777 /application/data; \

# clean package manager
RUN apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*;

EXPOSE 8080

CMD service php8.2-fpm start && nginx -g 'daemon off;'
