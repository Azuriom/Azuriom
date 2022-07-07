# Use with Docker & Docker Compose

Requirements:
- [Docker](https://docs.docker.com/engine/install/)
- [Docker Compose](https://docs.docker.com/compose/install/)
- bash shell (usually already installed)
- [git](https://git-scm.com/)

Note : All the following commands should be run as root

# Dependencies installation example

## Install docker
``` 
apt update 
apt install -y curl git software-properties-common curl apt-transport-https ca-certificates gnupg tar
curl -sSL https://get.docker.com/ | CHANNEL=stable bash 
```
And enable Docker on boot 
```
systemctl enable --now docker && service docker start
```

# Installation

## Download Azuriom 
```
mkdir -p /var/azuriom && cd /var/azuriom && git clone --depth 1 https://github.com/Azuriom/Azuriom.git .
```

## Set rights on files & folders
```
chmod -R o+rw storage bootstrap/cache resources/themes plugins
chmod +x azuriom.sh
```

## Change the owner to www-data
If the `www-data` user doesn't exists, you need to add it (if an error tell your that this user already exists no worries, just skip it) :  
```
useradd www-data
```
```
chown -R www-data:www-data /var/azuriom
```

## Setup `.env`
Copy the `.env.example` to `.env` and set the database information like this:

### Use an external database that uou setup on your own

```
DB_CONNECTION=mysql
DB_HOST=[IP adresse of your database. If you use a local database, set the public IP of your server (localhost or 127.0.0.1 won't work)]
DB_PORT=3306
DB_DATABASE=[database_name]
DB_USERNAME=[database_user]
DB_PASSWORD=[database_password]
```

### Or use a database provided with docker

```
DB_CONNECTION=pgsql
DB_HOST=database
DB_PORT=5432
DB_DATABASE=azuriom
DB_USERNAME=azuriom
DB_PASSWORD=[Here_A_Random_String]
```


## Build everything
```
./azuriom.sh build
```

## Start your services 
`php-fpm` needs to be started so others commands using it can run
```
./azuriom.sh start
```

## Generate the secret key (only for new install)
```
./azuriom.sh laravel-generate-key
```

## Database initialisation (only for new install)
```
./azuriom.sh laravel-init-db
```

## Create a new user as an administrator
```
./azuriom.sh laravel-create-admin
```

## Configure scheduled tasks
```bash
crontab -l > cron 
echo "* * * * * cd /var/azuriom && make artisan schedule:run >> /dev/null 2>&1" >> cron
crontab cron
rm cron
```

# Start and stop

## Start your services on default port 80
```
./azuriom.sh start
```

If you want to always start your container on a specific port, just add `PORT=8080` to your `.env` file

## You can down the containers with
```
./azuriom.sh stop
```

## How to update Azuriom

* `git pull` 
* `./azuriom.sh build`
* `./azuriom.sh laravel-clear-cache`
* `./azuriom.sh laravel-migrate`

# More commands
```
Commands:
   build                      Build the whole application.
   start                      Start containers (require the whole application to be built)
   docker-compose-build       Build containers
   npm-install                Install npm dependencies
   npm-run-prod               Compile assets (require npm dependencies to be installed)
   composer-install           Install composer dependencies
   laravel-generate-key       Generate laravel APP_KEY in .env file (used by laravel for data encryption)
   laravel-init-db            Initiate database
   laravel-migrate            Run migration (mostly used when updating to insert database changes)
   laravel-symlink            Create a symlink (create a symlink public/storage -> storage/app/public)
   laravel-create-admin       Create an admin user through CLI
   laravel-clear-cache        Clear laravel cache
   artisan <commands>         Run any artisan command (e.g. ./azuriom artisan cache:clear)
```
