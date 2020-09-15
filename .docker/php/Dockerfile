FROM php:7.4-cli

ARG uid=1000
ARG login="dev"

RUN apt-get update \
&&  apt-get upgrade -y \
&&  apt-get install -y \
    wget \
    zip \
    git \
&&  wget -O "/usr/local/bin/composer" "https://getcomposer.org/composer-stable.phar" \
&&  chmod -R 755 "/usr/local/bin" \
&&  useradd --create-home --user-group --uid=$uid $login
