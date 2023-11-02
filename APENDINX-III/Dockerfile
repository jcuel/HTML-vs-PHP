# Use the official PHP 7.4 runtime as a parent image
FROM php:7.4-apache

# Copy your index.php file into the Docker container at /var/www/html
COPY . /var/www/html/

# Set the permissions for the files to allow the Apache user to access them
RUN chown -R www-data:www-data /var/www/html

# Allow the apache user to access the directory
RUN chmod -R 755 /var/www/html

# Install any necessary extensions to connect postgresql
RUN docker-php-ext-install pdo pdo_pgsql

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Change the port to 80
EXPOSE 80

# Command to run Webserver
CMD ["apache2ctl", "-D", "FOREGROUND"]
