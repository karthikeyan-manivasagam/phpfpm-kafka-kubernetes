FROM php:8.3-fpm
RUN apt-get update && apt-get install -y \
    librdkafka-dev \
    libzip-dev \
    && pecl install rdkafka \
    && docker-php-ext-enable rdkafka
WORKDIR /var/www/html
COPY . /var/www/html
EXPOSE 9000
CMD ["php-fpm"]