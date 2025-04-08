<?php
session_start();
require_once 'config/sql_config.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $web_username = trim($_POST['username']);
    $web_email = trim($_POST['email']);
    $web_password = trim($_POST['password']);
    $web_confirm_password = trim($_POST['confirm_password']);
    
    if (empty($web_username) || empty($web_email) || empty($web_password) || empty($web_confirm_password)) {
        $error = '所有字段都必须填写';
    } elseif ($web_password !== $web_confirm_password) {
        $error = '两次输入的密码不一致';
    } elseif (strlen($web_password) < 8) {
        $error = '密码长度至少为8个字符';
    } else {
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("数据库连接失败: " . $conn->connect_error);
        }
        
        // 检查用户名是否已存在
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $web_username);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $error = '用户名已存在';
        } else {
            // 创建新用户
            $hashed_password = password_hash($web_password, PASSWORD_DEFAULT);
            $insert = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $insert->bind_param("sss", $web_username, $web_email, $hashed_password);
            
            if ($insert->execute()) {
                // 获取新用户ID
                $user_id = $conn->insert_id;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $web_username;
                $success = '注册成功！正在跳转...';
                header("Refresh: 2; url=index.php");
            } else {
                $error = '注册失败，请稍后再试';
            }
            $insert->close();
        }
        $stmt->close();
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>网络安全训练平台 - 注册</title>
    <link href="./js/bootstrap-5.3.5-dist/bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <h2 class="text-center mb-4">注册新账号</h2>
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if (!empty($success)): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">用户名</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">电子邮箱</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">密码</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">确认密码</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">注册</button>
                <div class="mt-3 text-center">
                    已有账号？<a href="login.php">立即登录</a>
                </div>
            </form>
        </div>
    </div>
    <script src="./js/bootstrap-5.3.5-dist/bootstrap-5.3.5-dist/css/bootstrap.bundle.min.js"></script>
</body>
</html>
