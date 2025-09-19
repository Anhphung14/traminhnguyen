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
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache \
    && chmod 664 /tmp/database.sqlite \
    && chown www-data:www-data /tmp/database.sqlite

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Create startup script for dynamic port configuration and Laravel setup
RUN echo '#!/bin/bash\n\
set -e\n\
\n\
# Get port from environment variable or default to 8080\n\
PORT=${PORT:-8080}\n\
echo "Starting application on port $PORT"\n\
\n\
# Set Laravel environment variables for production\n\
export APP_ENV=production\n\
export APP_DEBUG=false\n\
export APP_KEY=base64:agxDflBGwzKvvE8q7to4soDNevUu7wLxpQz0Y5r2OKk=\n\
export APP_URL=https://traminhnguyen-00006-nvx-272453304555.a.run.app\n\
export DB_CONNECTION=sqlite\n\
export DB_DATABASE=/tmp/database.sqlite\n\
export CACHE_DRIVER=file\n\
export SESSION_DRIVER=file\n\
export FILESYSTEM_DISK=local\n\
export LOG_CHANNEL=stack\n\
export LOG_LEVEL=debug\n\
\n\
# Create database if it doesn'\''t exist\n\
if [ ! -f /tmp/database.sqlite ]; then\n\
    echo "Creating SQLite database..."\n\
    touch /tmp/database.sqlite\n\
    chmod 664 /tmp/database.sqlite\n\
    chown www-data:www-data /tmp/database.sqlite\n\
fi\n\
\n\
# Fix permissions for storage and cache directories\n\
echo "Setting up permissions..."\n\
chown -R www-data:www-data /var/www/html/storage\n\
chown -R www-data:www-data /var/www/html/bootstrap/cache\n\
chmod -R 775 /var/www/html/storage\n\
chmod -R 775 /var/www/html/bootstrap/cache\n\
\n\
# Ensure storage link exists\n\
echo "Creating storage symbolic link..."\n\
if [ ! -L /var/www/html/public/storage ]; then\n\
    ln -sfn /var/www/html/storage/app/public /var/www/html/public/storage\n\
fi\n\
\n\
# Clear any existing caches first\n\
echo "Clearing Laravel caches..."\n\
php artisan config:clear\n\
php artisan route:clear\n\
php artisan view:clear\n\
php artisan cache:clear\n\
\n\
# Run Laravel migrations\n\
echo "Running database migrations..."\n\
php artisan migrate --force --no-interaction\n\
\n\
# Cache Laravel configuration for production\n\
echo "Optimizing Laravel for production..."\n\
php artisan config:cache\n\
php artisan route:cache\n\
php artisan view:cache\n\
\n\
# Update Apache configuration with the correct port\n\
echo "Configuring Apache for port $PORT..."\n\
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
echo "Starting Apache server..."\n\
exec apache2-foreground' > /usr/local/bin/start-apache.sh

# Make the script executable
RUN chmod +x /usr/local/bin/start-apache.sh

# Expose port (Cloud Run will set PORT env var)
EXPOSE 8080

# Start Apache using the startup script
CMD ["/usr/local/bin/start-apache.sh"]