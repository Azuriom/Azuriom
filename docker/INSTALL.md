# Use with Docker & Docker Compose
Requirements :
- [Docker](https://docs.docker.com/engine/install/)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Make](https://en.wikipedia.org/wiki/Make_(software))

# Installation

Get the repository
```
git clone https://github.com/Azuriom/Azuriom.git
```

Go into the folder
```
cd Azuriom
```

Set rights on files & folders
```
chmod -R 755 storage bootstrap/cache resources/themes plugins
```

Copy the **.env.example** to .env and set the database informations like this
```
DB_CONNECTION=pgsql
DB_HOST=database
DB_PORT=5432
DB_DATABASE=[database name]
DB_USERNAME=[database user]
DB_PASSWORD=[database password (can't be empty)]
```

Start the containers
```
make start
```

Generate the secret key
```
make generate-key
```

Database initialisation
```
make init-db
```

Generate the symlink
```
make symlink
```

Create a new user as an administrator
```
make create-admin
```

It's ready to be used on port 80 !

[Optional]
You can a scheduler with this CRON entry
```
* * * * * cd [Path to the CMS folder] && docker-compose exec php-fpm php artisan schedule:run >> /dev/null 2>&1
```

---
You can down the containers with
```
make stop
```