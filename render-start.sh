#!/usr/bin/env bash

# Instalar dependencias frontend (Vue)
npm install
npm run build

# Instalar dependencias PHP (Laravel)
composer install --no-interaction --prefer-dist --optimize-autoloader

# Cache de configuración
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Migraciones forzadas (BD en producción)
php artisan migrate --force

# Iniciar servidor Laravel en el puerto 10000
php artisan serve --host=0.0.0.0 --port=10000
