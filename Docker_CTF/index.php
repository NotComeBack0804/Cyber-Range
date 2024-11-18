<?php
// 设置要下载的文件目录
$directory = './'; // 替换为你的目录路径

// 获取目录下的所有文件，且只显示zip文件
$files = preg_grep('/\.zip$/', array_diff(scandir($directory), array('.', '..', 'index.php')));

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['file'])) {
    $file = basename($_GET['file']);
    $filePath = $directory . '/' . $file;

    // 确保文件存在
    if (file_exists($filePath)) {
        // 设置头部信息
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    } else {
        echo "File not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文件下载</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
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
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
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
        .file-list {
            list-style: none;
            padding: 0;
        }
        .file-list li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .file-list li:last-child {
            border-bottom: none;
        }
        .file-list a {
            text-decoration: none;
            color: #007bff;
        }
        .file-list a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>文件下载</h1>
                <!-- 返回上级目录的按钮 -->
        <a href="../" class="back-button">返回</a>
        <ul class="file-list">
            <?php foreach ($files as $file): ?>
                <li>
                    <a href="?file=<?php echo urlencode($file); ?>">
                        <i class="fas fa-file-download"></i> <?php echo htmlspecialchars($file); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>