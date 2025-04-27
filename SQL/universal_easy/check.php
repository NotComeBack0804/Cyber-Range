<?php
include('../../config/sql_config.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit();
}
// 获取POST请求中的用户名和密码
$username = $_POST['username'];
$password = $_POST['password'];
 
// 构造SQL查询语句
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
 
// 执行查询
$result = mysqli_query($conn, $sql);
 
// 检查查询结果是否包含匹配的用户
if (mysqli_num_rows($result) > 0) {
    // 用户存在，登录成功
    echo "Login success!";
    echo "Flag{hasijalshfjksajdajsas}";
} else {
    // 用户不存在，登录失败
    echo "Login failed!";
}
 
// 关闭数据库连接
mysqli_close($conn);
?>