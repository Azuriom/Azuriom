# Contributing to Azuriom

## Code style

Azuriom follows the [PSR-12 coding style](https://www.php-fig.org/psr/psr-12/).

[Laravel Pint](https://github.com/laravel/pint) is included in the Composer dev-dependencies,
and can be used to automatically fix code style issues with this command:
```
./vendor/bin/pint
```

## Manual installation for development

1. Clone the [GitHub repository](https://github.com/Azuriom/Azuriom).
    ```
    git clone https://github.com/Azuriom/Azuriom.git
    ```

1. Copy the `.env.example` file to `.env` and specify the database connection information.

1. Set write/read permissions to the `storage/`, `bootstrap/cache/`, `resources/themes/` and `plugins/` folders:
    ```
    chmod -R 755 storage bootstrap/cache resources/themes plugins
    ```

1. Install the PHP dependencies with [Composer](https://getcomposer.org/):
    ```
    composer install
    ```

1. Install the front-end dependencies with [NPM](https://www.npmjs.com/):
   ```
   npm install && npm run dev
   ```

1. Generate the secret key:
    ```
    php artisan key:generate
    ```

1. Setup the database:
    ```
    php artisan migrate --seed
    ```

1. Create the storage symlink
    ```
    php artisan storage:link
    ```

1. Create an admin account _(Optional but recommended)_:
    ```
    php artisan user:create --admin
    ```

1. Configure your web server to point to the `public/` folder _(Optional but recommended)_.

1. Setup the scheduler _(Optional but recommended)_:
    
    Some features need the scheduler to be set up, for this you need to configure your server to run the command `php artisan schedule:run` every minute, for example by adding this Cron entry (don't forget to replace `/var/www/azuriom` with the location of the site):     
    ```
    * * * * * cd /var/www/azuriom && php artisan schedule:run >> /dev/null 2>&1
    ```
