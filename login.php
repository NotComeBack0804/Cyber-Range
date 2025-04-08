<?php
session_start();
require_once 'config/sql_config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $web_username = trim($_POST['username']);
    $web_password = trim($_POST['password']);
    
    if (empty($web_username) || empty($web_password)) {
        $error = '用户名和密码不能为空';
    } else {
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("数据库连接失败: " . $conn->connect_error);
            }
            
            $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
            $stmt->bind_param("s", $web_username);
            $stmt->execute();
            $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($web_password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: index.php");
                exit();
            } else {
                $error = '用户名或密码错误';
            }
        } else {
            $error = '用户名或密码错误';
        }
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>网络安全训练平台 - 登录</title>
    <link href="./js/bootstrap-5.3.5-dist/bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
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
        <div class="login-container">
            <h2 class="text-center mb-4">网络安全训练平台</h2>
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">用户名</label> 
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">密码</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">记住我</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">登录</button>
                <div class="mt-3 text-center">
                    <a href="register.php">注册新账号</a>
                </div>
            </form>
        </div>
    </div>
    <script src="./js/bootstrap-5.3.5-dist/bootstrap-5.3.5-dist/css/bootstrap.bundle.min.js"></script>
</body>
</html>
