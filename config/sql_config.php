<?php
$servername = "127.0.0.1"; //数据库的ip
$username = "root"; //数据库用户名
$password = "root"; //数据库密码
$dbname = "sql";    //指定的数据库，默认为sql

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}
?>