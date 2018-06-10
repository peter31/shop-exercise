#!/bin/bash

docker exec exercise composer install;

docker exec exercise /bin/bash -c "if [ ! -f config.php ]; then cp config.php.dist config.php; fi;"

mysql exercise -h0.0.0.0 -P3308 -uexercise -pqwerty < ./scheme.sql;
