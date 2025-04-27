<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit();
}
// error_reporting(0);
$userdir = "uploads/" . md5($_SERVER["REMOTE_ADDR"]);
if (!file_exists($userdir)) {
    mkdir($userdir, 0777, true);
    file_put_contents($userdir."/haha.php", '');
}
if (isset($_FILES['file-upload']) && $_FILES['file-upload']['error'] == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES["file-upload"]["tmp_name"];
    $name = $_FILES["file-upload"]["name"];
    if (!$tmp_name) {
        die("filesize too big!");
    }
    if (!$name) {
        die("filename cannot be empty!");
    }
    $extension = substr($name, strrpos($name, ".") + 1);
    if (preg_match("/ph|htacess/i", $extension)) {
        die("illegal suffix!");
    }
    if (mb_strpos(file_get_contents($tmp_name), "php") !== FALSE) {
        die("php in contents!");
    }
    $upload_file_path = $userdir . "/" . $name;
    move_uploaded_file($tmp_name, $upload_file_path);
    echo "Your dir " . $userdir. ' <br>';
    echo 'Your files : <br>';
    var_dump(scandir($userdir));
}
