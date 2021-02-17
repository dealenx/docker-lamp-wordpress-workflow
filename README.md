# LAMP stack for setup Wordpress

This is a basic LAMP stack environment built using Docker Compose. It consists following:

- PHP 7.4
- Apache 2.4
- MySQL 5.7 and MySQL 8 or MariaDB 10.3
- phpMyAdmin
- Redis
- MailHog

This build of these two repositories:

- https://github.com/georgknabl/pos-wordpress-workflow
- https://github.com/sprintcube/docker-compose-lamp

## Prerequisites

You must have the following software installed and available:
* Docker
* Composer


## Installation

Clone this repository on your local computer. Run the `docker-compose up -d`.

```shell
git clone https://github.com/dealenx/docker-lamp-wordpress-workflow.git
cd docker-lamp-wordpress-workflow/
cp sample.env .env
cp env.docker.php env.php

docker-compose up -d
docker-compose exec webserver composer install &&  chmod 777 .

sudo chmod 777 -R ./wp-content/

cp -r ./cms/wp-content/themes/* ./wp-content/themes



```
or
```
./setup-docker.sh
```

Your LAMP stack is now ready!! You can access it via `http://localhost`.

## Setup WordPress without Docker

All following commands assume you have cd'ed into the project directory.

Prepare WordPress:

1. `$ composer install`
2. `$ cp env.example.php env.php`
3. Setup WordPress by visiting wp-admin (cms/wp-admin/) in your browser.

Once you switch to another server, make sure to correctly adapt the `env.php` file.

## Configuration

This package comes with default configuration options. You can modify them by creating `.env` file in your root directory.

To make it easy, just copy the content from `sample.env` file and update the environment variable values as per your need.

### Configuration Variables

There are following configuration variables available and you can customize them by overwritting in your own `.env` file.

_**DOCUMENT_ROOT**_

It is a document root for Apache server. The default value for this is `./`. All your sites will go here and will be synced automatically.

_**MYSQL_DATA_DIR**_

This is MySQL data directory. The default value for this is `./docker/data/mysql`. All your MySQL data files will be stored here.

_**VHOSTS_DIR**_

This is for virtual hosts. The default value for this is `./docker/config/vhosts`. You can place your virtual hosts conf files here.

> Make sure you add an entry to your system's `hosts` file for each virtual host.

_**APACHE_LOG_DIR**_

This will be used to store Apache logs. The default value for this is `./docker/docker/logs/apache2`.

_**MYSQL_LOG_DIR**_

This will be used to store Apache logs. The default value for this is `./docker/logs/mysql`.

## Web Server

Apache is configured to run on port 80. So, you can access it via `http://localhost`.

#### Apache Modules

By default following modules are enabled.

- rewrite
- headers

> If you want to enable more modules, just update `./docker/bin/webserver/Dockerfile`. You can also generate a PR and we will merge if seems good for general purpose.
> You have to rebuild the docker image by running `docker-compose build` and restart the docker containers.

#### Connect via SSH

You can connect to web server using `docker-compose exec` command to perform various operation on it. Use below command to login to container via ssh.

```shell
docker-compose exec webserver bash
```

## Database

There are following configuration variables available and you can customize them by overwritting in your own .env file.

_**DATABASE**_

Switch the database vendor from mysql to mariadb. You can also easily add additonal database versions.

## PHP

The installed version of PHP is 7.4

#### Extensions

By default following extensions are installed.

- mysqli
- pdo_sqlite
- pdo_mysql
- mbstring
- zip
- intl
- mcrypt
- curl
- json
- iconv
- xml
- xmlrpc
- gd

> If you want to install more extension, just update `./docker/bin/webserver/Dockerfile`. You can also generate a PR and we will merge if seems good for general purpose.
> You have to rebuild the docker image by running `docker-compose build` and restart the docker containers.

## phpMyAdmin

phpMyAdmin is configured to run on port 8080. Use following default credentials.

http://localhost:8080/  
username: root  
password: tiger

## Redis

It comes with Redis. It runs on default port `6379`.

## MailHog

- the SMTP server starts on port `1025`
- the HTTP server starts on port `8025`
