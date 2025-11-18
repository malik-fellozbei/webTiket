#!/bin/sh

chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

echo "Fixing permissions using chmod..."
chmod -R 775 /var/www/storage
chmod -R 775 /var/www/bootstrap/cache

echo "Starting PHP-FPM..."
/usr/local/sbin/php-fpm -D

echo "Starting Laravel Artisan Development Server on 0.0.0.0:8075..."
exec php artisan serve --host=0.0.0.0 --port=9000 &

echo "Processes are running. Keeping container alive..."
tail -f /dev/null