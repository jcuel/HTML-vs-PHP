# Set the base image
FROM php:7.4-apache

# Copy custom application files
COPY ./my-php-website /var/www/html

# Change ownership of the copied files
RUN chown -R www-data:www-data /var/www/html

# Set the document root
DOCUMENT_ROOT /var/www/html

# Set the directory for configuration
RUN a2enmod rewrite

# Install required extension for mysql
RUN docker-php-ext-install mysqli

# add additional setup
RUN echo 'AllowOverride All' >> /etc/apache2/apache2.conf

# Make port 80 available to the world outside this container
EXPOSE 80

# This is the command to execute in the container when it launches
CMD ["apache2-foreground"]
