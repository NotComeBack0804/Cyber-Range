<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>搜索界面</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        input[type="text"] {
            width: 300px;
            padding: 10px;
            margin-right: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
        }
    </style>
</head>
<body>

<h1>搜索界面</h1>
<form method="GET" action="index.php">
    <input type="text" name="query" placeholder="请输入搜索关键字" required>
    <input type="submit" value="搜索">
</form>

<?php
if (isset($_GET['query'])) {
    $query = $_GET['query']; // 获取用户输入并防止 XSS
    echo "<h2>搜索结果: '{$query}'</h2>";
}
?>

</body>
</html>