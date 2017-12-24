#!/bin/bash

#shutdown the app
php artisan down
# Pulling latest changes
git pull origin master
# Install composer while optimizing
composer install --optimize-autoloader
# Optimizing cache
php artisan cache:clear
php artisan route:cache
php artisan config:cache
php artisan view:cache
# Migrate db changes
php artisan migrate --force
# Turn on the app
php artisan up