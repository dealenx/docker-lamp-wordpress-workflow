cp sample.env .env
cp env.docker.php env.php
composer install
cp -r ./cms/wp-content/themes/* ./wp-content/themes
sudo chmod 777 -R ./wp-content/
docker-compose up -d

