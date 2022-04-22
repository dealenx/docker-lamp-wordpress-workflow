MYSQL_DATABASE=$(find . -name "env.php" -print0 | xargs -0 -r grep -e "MYSQL_DATABASE" | grep -Po "(?<=(] = 
')).*(?=';)" )
MYSQL_USER=$(find . -name "env.php" -print0 | xargs -0 -r grep -e "MYSQL_USER" | grep -Po "(?<=(] = ')).*(?=';)" 
)
MYSQL_PASSWORD=$(find . -name "env.php" -print0 | xargs -0 -r grep -e "MYSQL_PASSWORD" | grep -Po "(?<=(] = 
')).*(?=';)" )

gunzip < ./wp-content/backup-db/db.sql.gz | mysql -u ${MYSQL_USER} -p${MYSQL_PASSWORD} ${MYSQL_DATABASE}

