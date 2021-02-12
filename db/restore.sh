export $(cat ../.env)

docker exec -i "$COMPOSE_PROJECT_NAME-mysql" /usr/bin/mysql -u docker  --password=docker  -e "DROP DATABASE IF EXISTS docker"
docker exec -i "$COMPOSE_PROJECT_NAME-mysql" /usr/bin/mysql -u docker  --password=docker  -e "CREATE DATABASE IF NOT EXISTS docker"
gunzip < docker.sql.gz | docker exec -i "$COMPOSE_PROJECT_NAME-mysql" /usr/bin/mysql   -u docker  --password=docker docker
