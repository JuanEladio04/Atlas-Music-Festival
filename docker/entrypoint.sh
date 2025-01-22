#!/bin/bash
set -e

INIT_FILE="/app/.initialized_file"

if [ ! -f "$INIT_FILE" ]; then
    echo "Primera vez que se lanza el contenedor. Ejecutando configuración inicial..."

    php artisan key:generate

    php artisan migrate --force
    php artisan db:seed --force

    php artisan storage:link

    touch "$INIT_FILE"
    echo "Inicialización completada."
else
    echo "El contenedor ya fue inicializado previamente. Omitiendo configuración inicial."
fi

exec "$@"
