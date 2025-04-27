# 使用 PHP 官方镜像，包含 Apache
FROM php:7.4-apache

# 安装所需的扩展和依赖
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip mysqli pdo pdo_mysql

# 启用 Apache 的 mod_rewrite 模块
RUN a2enmod rewrite


# 设置 Apache 的 DocumentRoot
ENV APACHE_DOCUMENT_ROOT /var/www/html

# 配置 Apache，以支持 .htaccess 文件
RUN echo "<Directory /var/www/html/>" > /etc/apache2/conf-available/custom.conf && \
    echo "    AllowOverride All" >> /etc/apache2/conf-available/custom.conf && \
    echo "</Directory>" >> /etc/apache2/conf-available/custom.conf && \
    a2enconf custom

# 暴露 Apache 默认端口
EXPOSE 80

# 启动 Apache 服务器
CMD ["apache2-foreground"]
