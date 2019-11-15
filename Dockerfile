FROM php:apache

RUN docker-php-ext-install pdo_mysql 

COPY . /var/www/html/

EXPOSE 80
EXPOSE 8080
EXPOSE 3306


