FROM php:7.4-apache

# Install mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Install pdo_mysql
RUN docker-php-ext-install pdo_mysql

# Enable mod_rewrite for URL rewrite and mod_headers for .htaccess extra headers like Access-Control-Allow-Origin-
RUN a2enmod rewrite headers

# By default, simply start apache.
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

# Expose port 80
EXPOSE 80

# Copy the content of the 'Testing' folder to the document root directory of the apache server.
COPY ReTech/ /var/www/html/

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

