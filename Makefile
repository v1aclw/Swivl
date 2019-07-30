up:
	docker-compose -f docker/docker-compose.yml up -d

down:
	docker-compose -f docker/docker-compose.yml down

provision: up mysql-init mysql-restore

restart: down up

mysql-init:
	docker exec docker_php_1 php /var/www/classroom/bin/console doctrine:database:create

mysql-backup:
	docker exec docker_mysql_1 /usr/bin/mysqldump -u root --password=root classroom > docker/mysql/backup.sql

mysql-restore:
	cat docker/mysql/backup.sql | docker exec -i docker_mysql_1 /usr/bin/mysql -u root --password=root classroom