#!/bin/sh

# Copy .env.example to .env if it doesn't exist
if [ ! -f /var/www/azuriom/.env ]; then
    cp /var/www/azuriom/.env.example /var/www/azuriom/.env
    echo "Created .env file from .env.example"
fi

exec "$@"
