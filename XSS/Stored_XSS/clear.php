<?php
session_start();
unset($_SESSION['messages']);
header("Location: index.php"); // 修改为你的留言板文件名
exit();