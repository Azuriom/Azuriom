# Use with Docker & Docker Compose

Requirements:
- [Docker](https://docs.docker.com/engine/install/)
- [Docker Compose](https://docs.docker.com/compose/install/)
- bash shell (usually already installed)
- [git](https://git-scm.com/)

Note : All the following commands should be run as root

# Dependencies installation example

``` 
apt update 
apt install -y curl git software-properties-common curl apt-transport-https ca-certificates gnupg tar
curl -sSL https://get.docker.com/ | CHANNEL=stable bash 
curl -L "https://github.com/docker/compose/releases/download/latest/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose
```

and enable docker on boot 
`systemctl enable --now docker && service docker start`

# Installation

## Download Azuriom 
```
mkdir -p /var/azuriom && cd /var/azuriom && git clone --depth 1 https://github.com/Azuriom/Azuriom.git .
```


Go into the downloaded folder
```
cd Azuriom
```

# Set rights on files & folders
`chmod -R 755 storage bootstrap/cache resources/themes plugins`
`chmod +x azuriom.sh`

# Change the owner to www-data
`useradd www-data` (if an error tell your that this user already exists no worries, just skip it)

`chown -R www-data *`

## Setup `.env`
Copy the `.env.example` to `.env` and set the database information like this:

### Use an external database that uou setup on your own

```
DB_CONNECTION=mysql
DB_HOST=[IP adresse of your database. If you use a local database, set the public IP of your server (localhost or 12.7.0.0.1 won't work)]
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
./azuriom start
```

If you want to always start your container on a specific port, just add `PORT=8080` to your `.env` file

## You can down the containers with
```
./azuriom stop
```

## How to update Azuriom

* `git pull` 
* `./azuriom.sh build`
* `./azuriom.sh laravel-clear-cache`
* `./azuriom.sh laravel-migrate`
