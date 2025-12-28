# Base PHP image
FROM php:8.2-fpm

# System dependencies
RUN apt-get update && apt-get install -y \
    libatomic1 \
    git \
    unzip \
    zip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    nginx \
    && docker-php-ext-install pdo pdo_mysql mbstring zip gd

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Configure nginx
RUN rm /etc/nginx/sites-enabled/default
COPY nginx.conf /etc/nginx/sites-available/default
RUN ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# Expose port 80
EXPOSE 80

# Start PHP-FPM and Nginx
CMD service nginx start && php-fpm
