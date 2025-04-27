<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ..    /login.php");
    exit();
}
// 获取当前目录的文件和目录
$items = scandir('.');
$items = array_diff($items, array('.', '..', 'index.php'));
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>目录页面</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #343a40;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .back-button {
            display: block;
            text-align: center;
            margin: 20px 0;
            padding: 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .item {
            background: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
            text-align: center;
            transition: background 0.3s;
        }
        .item:hover {
            background: #e9ecef;
        }
        .item a {
            text-decoration: none;
            color: #007bff;
            font-size: 18px;
        }
        .item a:hover {
            text-decoration: underline;
        }
        .item span {
            display: block;
            color: #6c757d;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>当前目录_后面是题目难度</h1>
                <!-- 返回上级目录的按钮 -->
        <a href="../" class="back-button">返回</a>
        <?php foreach ($items as $item): ?>
            <div class="item">
                <?php if (is_dir($item)): ?>
                    <a href="<?php echo $item; ?>"><?php echo $item; ?></a>
                    <span>题目</span>
                <?php else: ?>
                    <a href="<?php echo $item; ?>"><?php echo $item; ?></a>
                    <span>文件</span>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>