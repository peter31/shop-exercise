FROM richarvey/nginx-php-fpm:latest

RUN docker-php-ext-install mysqli
