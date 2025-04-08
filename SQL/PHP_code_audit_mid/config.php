<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit();
}
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "SQL";
function stop_hack($value){
    $pattern =  
        "insert|delete|or|concat|concat_ws|group_concat|join|floor|
        \/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile|dumpfile|sub|hex|
        file_put_contents|fwrite|curl|system|eval";
    $back_list = explode("|",$pattern);
    foreach ($back_list as $hack){
        if (preg_match("/$hack/i",$value)) {
            die("$hack detected");
        }
    }
   return $value;
}
?>