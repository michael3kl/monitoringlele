FROM php:8.2-apache

# Install PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy PHP configuration to completely suppress errors for production
RUN echo "error_reporting = 0" > /usr/local/etc/php/conf.d/php-compatibility.ini \
    && echo "display_errors = Off" >> /usr/local/etc/php/conf.d/php-compatibility.ini \
    && echo "display_startup_errors = Off" >> /usr/local/etc/php/conf.d/php-compatibility.ini \
    && echo "log_errors = Off" >> /usr/local/etc/php/conf.d/php-compatibility.ini \
    && echo "output_buffering = 4096" >> /usr/local/etc/php/conf.d/php-compatibility.ini

# Copy application files
COPY . /var/www/html/

WORKDIR /var/www/html

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html
