#!/bin/bash

# Set permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 777 /var/www/html/storage/logs

# Ensure the log file exists
touch /var/www/html/storage/logs/laravel.log
chown www-data:www-data /var/www/html/storage/logs/laravel.log
chmod 666 /var/www/html/storage/logs/laravel.log

# Run migrations
php artisan migrate --force || echo "Migration failed, continuing..."

# Start Apache
exec apache2-foreground
# Clear any existing cache
echo "Clearing cache..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Run Laravel migrations
echo "Running migrations..."
php artisan migrate --force || echo "Migration failed, continuing..."

# Optimize application for production
echo "Optimizing application..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start Apache
echo "Starting Apache..."
exec apache2-foreground
