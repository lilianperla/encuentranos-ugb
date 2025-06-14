#!/usr/bin/env bash

# Instalar dependencias frontend
npm install
npm run build

# Instalar dependencias PHP
composer install --no-interaction --prefer-dist --optimize-autoloader

# Cache de configuración
php artisan config:cache

# Ejecutar migraciones
php artisan migrate --force

# Iniciar servidor
php artisan serve --host=0.0.0.0 --port=10000
