<?php
// 检查用户是否已登录，假设通过会话管理
session_start();

// 简单的登录验证示例
if (!isset($_SESSION['username'])||$_SESSION['loggedin'] !== true) {
    // 如果用户未登录，重定向到登录页面
    header("Location: login.php");
    exit();
}

// 登录成功后的用户姓名
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录成功</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f0f8ff;
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #4caf50;
        }
        a {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #008cba;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #005f6b;
        }
    </style>
</head>
<body>
    <h1>恭喜你，<?php echo htmlspecialchars($username); ?>！登录成功！</h1>
    <p>欢迎来到你的个人空间！</p>
    <p>flag{Hyyyyyyyy_No.1!!!!!!!!!}</p>
    <a href="loginout.php">返回主页</a>
</body>
</html>