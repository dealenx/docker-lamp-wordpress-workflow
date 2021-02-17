cp sample.env .env
cp env.docker.php env.php

docker-compose up -d
docker-compose exec webserver composer install &&  chmod 777 .

sudo chmod 777 -R ./wp-content/

cp -r ./cms/wp-content/themes/* ./wp-content/themes
