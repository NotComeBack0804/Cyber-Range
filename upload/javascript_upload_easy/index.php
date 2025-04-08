<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文件上传页面</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="file"] {
            border: 2px dashed #007BFF;
            border-radius: 5px;
            padding: 5px;
            width: 50%;
            height: 20px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="file"]:hover {
            background-color: #e9f3ff;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        #file-info {
            margin-top: 10px;
            color: #333;
            text-align: center;
        }

        .error-message {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit();
}
?>
<div class="container">
    <h1>文件上传</h1>
    <form id="upload-form" action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="file-upload">选择文件：</label>
        <input type="file" id="file-upload" name="file-upload" accept=".jpg,.jpeg,.png,.gif,.pdf" required>
        <div class="error-message" id="error-message"></div>
        <button type="submit">上传</button>
    </form>
    <div id="file-info"></div>
</div>

<script>
    document.getElementById('upload-form').addEventListener('submit', function(event) {
        const fileInput = document.getElementById('file-upload');
        const fileInfoDiv = document.getElementById('file-info');
        const errorMessageDiv = document.getElementById('error-message');
        const fileName = fileInput.value.split('\\').pop(); // 获取文件名

        // 清除之前的错误信息
        errorMessageDiv.textContent = '';

        // 检查文件名是否包含 '.php'
        if (fileName.includes('.php')) {
            errorMessageDiv.textContent = '不允许上传包含 ".php" 后缀的文件。';
            alert('100的水瓶卖你90');
            event.preventDefault(); // 阻止表单提交
            return;
        }

        // 显示已选择的文件名
        if (fileInput.files.length > 0) {
            fileInfoDiv.textContent = `已选择文件: ${fileName}`;
        } else {
            fileInfoDiv.textContent = '未选择文件';
        }
    });
</script>

</body>
</html>