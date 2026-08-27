#!/bin/sh
set -e

export PORT="${PORT:-10000}"

if [ -z "$APP_KEY" ]; then
    export APP_KEY=$(php artisan key:generate --show)
fi

php artisan config:cache
php artisan route:cache
php artisan view:cache

envsubst '${PORT}' < /etc/nginx/templates/default.conf.template > /etc/nginx/sites-enabled/default

php-fpm -D

exec nginx -g "daemon off;"
