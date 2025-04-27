@echo off
set /p username=input_you_username:
set /p password=input_you_password:
set /p ip=input_you_mysql_ip:
mysql -u "%username%" -p"%password%" -h "%ip%" -e "CREATE DATABASE `sql`; USE sql; source ./cyber.sql;"
pause