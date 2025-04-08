<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit();
}

// 初始化留言数组
if (!isset($_SESSION['messages'])) {
    $_SESSION['messages'] = [];
}

// 处理留言提交
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['message'])) {
    $message = trim($_POST['message']);
    $_SESSION['messages'][] = $message;
}
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言板</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .message {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            background: #f9f9f9;
        }
        .message p {
            margin: 0;
        }
        form {
            margin-top: 20px;
        }
        textarea {
            width: 100%;
            height: 80px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            resize: none;
        }
        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>留言板</h1>

    <?php if (!empty($_SESSION['messages'])): ?>
        <?php foreach ($_SESSION['messages'] as $msg): ?>
            <div class="message">
                <p><?php echo $msg; ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>暂无留言，快来留言吧！</p>
    <?php endif; ?>

    <form method="POST">
    <textarea name="message" placeholder="在这里输入你的留言..." required></textarea>
    <button type="submit"><i class="fas fa-paper-plane"></i> 提交留言</button>
    <button type="button" onclick="window.location.href='clear.php'">清除留言</button>
</form>
</div>

</body>
</html>