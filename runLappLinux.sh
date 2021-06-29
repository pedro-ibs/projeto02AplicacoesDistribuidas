#! /bin/bash

echo "Ensserando apache2.service e mariadb.service" 
sudo systemctl stop mariadb.service
sudo systemctl stop apache2.service

echo "Iniciando o apache2 e MySQL Database"
sudo /opt/lampp/xampp start startapache
sudo /opt/lampp/xampp start startmysql
