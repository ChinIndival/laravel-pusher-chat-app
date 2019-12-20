#!/bin/bash 
cd /var/www/html/chat
# 
# Run composer 
composer install 
# 
# Run artisan commands 
php /var/www/html/chat/artisan migrate:refresh
 
# php /var/www/html/test/artisan db:seed 