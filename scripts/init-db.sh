#!/bin/bash

# Create database directory if it doesn't exist
mkdir -p /tmp

# Create SQLite database
touch /tmp/database.sqlite

# Set proper permissions
chmod 664 /tmp/database.sqlite

# Run migrations
php artisan migrate --force

# Seed database with admin user
php artisan db:seed --force

echo "Database initialized successfully!"

