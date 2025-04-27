# 使用官方 MySQL 镜像作为基础
FROM mysql:5.7.26

# 设置环境变量
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=sql
ENV MYSQL_USER=huangyuhao
ENV MYSQL_PASSWORD=huangyuhao

# 拷贝初始化 SQL 脚本到临时目录
COPY ./cyber.sql /docker-entrypoint-initdb.d/

# 暴露 MySQL 默认端口
EXPOSE 3306
