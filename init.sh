#!/bin/bash

docker exec exercise composer install;

docker exec exercise cp config.php.dist config.php;

mysql -h0.0.0.0 -P3308 -uexercise -pqwerty < ./scheme.sql;
