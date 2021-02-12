export $(cat ../.env)

docker exec "$COMPOSE_PROJECT_NAME-mysql" /usr/bin/mysqldump -u docker --password=docker docker --no-tablespaces | gzip > docker.sql.gz
