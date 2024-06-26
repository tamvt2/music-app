FROM php:8.1-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    libjpeg62-turbo-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install pdo_mysql extension
RUN docker-php-ext-install pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Copy application source
COPY . /var/www/html

# Install Composer dependencies
RUN composer install --no-dev

# Set permissions for storage and cache directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public/storage
RUN chmod -R 775 /var/www/html/storage /var/www/html/public/storage

# Set execute permission for artisan
RUN chmod +x /var/www/html/artisan

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Run PHP-FPM
CMD ["php-fpm"]
