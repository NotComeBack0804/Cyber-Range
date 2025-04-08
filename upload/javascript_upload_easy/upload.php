<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 检查文件是否上传成功
    if (isset($_FILES['file-upload']) && $_FILES['file-upload']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';  // 设置上传目录
        $fileName = basename($_FILES['file-upload']['name']);
        $uploadFilePath = $uploadDir . $fileName;

        // 创建上传目录（如果不存在）
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // 移动上传的文件
        if (move_uploaded_file($_FILES['file-upload']['tmp_name'], $uploadFilePath)) {
            echo "文件上传成功: " . htmlspecialchars($fileName).",路径为:".$uploadFilePath;
        } else {
            echo "文件上传失败，请重试。";
        }
    } else {
        echo "文件上传出错。";
    }
} else {
    echo "无效的请求。";
}
?>