cp sample.env .env
cp env.docker.php env.php

docker-compose up -d
docker-compose exec webserver composer install &&  chmod 777 .
docker-compose exec webserver wp language core install  --allow-root ru_RU
docker-compose exec webserver wp language plugin install --allow-root --all ru_RU 
sudo chmod 777 -R ./wp-content/

cp -r ./cms/wp-content/themes/* ./wp-content/themes
