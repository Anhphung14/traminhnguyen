# Use PHP 8.3 with Apache
FROM php:8.3-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libwebp-dev \
    libxpm-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    libzip-dev \
    pkg-config

# Install Node.js (LTS) & npm from NodeSource
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions (gd needs extra config)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) pdo_mysql mbstring exif pcntl bcmath gd pdo_sqlite zip

# Install Composer (multi-stage)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy composer files first for better caching
COPY composer.json composer.lock ./

# Install PHP dependencies (skip scripts during build)
RUN composer install --optimize-autoloader --no-dev --no-scripts

# Copy application files
COPY . .

# Run composer scripts after copying all files
RUN composer run-script post-autoload-dump

# Tạo thư mục storage và symbolic link
RUN mkdir -p /var/www/html/storage/app/public \
    && ln -sfn /var/www/html/storage/app/public /var/www/html/public/storage

# Install Node dependencies and build assets
RUN npm install --legacy-peer-deps && npm run build

# Create SQLite database
RUN touch /tmp/database.sqlite

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache \
    && chmod 664 /tmp/database.sqlite

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Create startup script for dynamic port configuration
RUN echo '#!/bin/bash\n\
# Get port from environment variable or default to 8080\n\
PORT=${PORT:-8080}\n\
\n\
# Update Apache configuration with the correct port\n\
echo "Listen $PORT" > /etc/apache2/ports.conf\n\
echo "<VirtualHost *:$PORT>" > /etc/apache2/sites-available/000-default.conf\n\
echo "    DocumentRoot /var/www/html/public" >> /etc/apache2/sites-available/000-default.conf\n\
echo "    <Directory /var/www/html/public>" >> /etc/apache2/sites-available/000-default.conf\n\
echo "        AllowOverride All" >> /etc/apache2/sites-available/000-default.conf\n\
echo "        Require all granted" >> /etc/apache2/sites-available/000-default.conf\n\
echo "    </Directory>" >> /etc/apache2/sites-available/000-default.conf\n\
echo "</VirtualHost>" >> /etc/apache2/sites-available/000-default.conf\n\
\n\
# Start Apache\n\
exec apache2-foreground' > /usr/local/bin/start-apache.sh

# Make the script executable
RUN chmod +x /usr/local/bin/start-apache.sh

# Expose port (Cloud Run will set PORT env var)
EXPOSE 8080

# Start Apache using the startup script
CMD ["/usr/local/bin/start-apache.sh"]