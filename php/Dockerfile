# From
FROM php:8-apache

RUN apt-get update && apt-get install -y libpq-dev &&  docker-php-ext-install pdo pdo_pgsql pgsql && rm -rf /var/lib/apt/lists/*
