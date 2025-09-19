FROM php:8.2-apache
WORKDIR /var/www/html

# Copy lahat ng files sa repo papunta kay Apache root
COPY . /var/www/html/

# Enable PHP extensions (important sa CRUD with MySQL)
RUN docker-php-ext-install mysqli pdo pdo_mysql

EXPOSE 80
CMD ["apache2-foreground"]
