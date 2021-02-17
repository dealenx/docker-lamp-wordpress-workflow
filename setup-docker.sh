cp sample.env .env
cp env.docker.php env.php

docker-compose up -d
docker-compose exec webserver composer install &&  chmod 777 .

cp -r ./cms/wp-content/themes/* ./wp-content/themes