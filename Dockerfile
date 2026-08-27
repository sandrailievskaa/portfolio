# syntax=docker/dockerfile:1

# ---- Stage 1: PHP dependencies ----
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-scripts \
    --no-autoloader \
    --no-interaction \
    --prefer-dist
COPY . .
RUN composer dump-autoload --no-dev --optimize \
    && php artisan package:discover --ansi

# ---- Stage 2: frontend assets (Vite / Vue) ----
FROM node:20-alpine AS frontend
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY . .
RUN npm run build

# ---- Stage 3: runtime image (PHP-FPM + nginx) ----
FROM php:8.3-fpm AS runtime

RUN apt-get update && apt-get install -y --no-install-recommends \
        nginx \
        libonig-dev \
        libsqlite3-dev \
        gettext-base \
    && docker-php-ext-install mbstring pdo pdo_sqlite bcmath pcntl exif \
    && docker-php-ext-enable opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --from=vendor /app ./
COPY --from=frontend /app/public/build ./public/build

COPY docker/nginx.conf.template /etc/nginx/templates/default.conf.template
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 10000

ENTRYPOINT ["entrypoint.sh"]
