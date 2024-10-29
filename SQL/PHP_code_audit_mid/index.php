<?php
require 'config.php';
include('../../config/sql_config.php');
highlight_file('index.php');
$sql="SELECT  COUNT(*) FROM shenji";
$whitelist = array();
$result = $conn->query($sql);
if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $whitelist = range(1,$row['COUNT(*)']);
}
$id = stop_hack($_GET['id']);
$sql = "SELECT * FROM shenji WHERE id=$id";

if (!in_array($id,$whitelist)){
    die("id $id is not in whitelist.");
}

$result = $conn->query($sql);
if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    echo "<center><table border='1'>";
    foreach ($row as $key=>$value){
        echo "<tr><td><center>$key</center></td><br>";
        echo "<td><center>$value</center></td></tr><br>";
    }
    echo "</table></center>";
}
else{
    die($conn->error);
}
// function stop_hack($value){
//     $pattern =
//         "insert|delete|or|concat|concat_ws|group_concat|join|floor|
//         \/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile|dumpfile|sub|hex|
//         file_put_contents|fwrite|curl|system|eval";
//     $back_list = explode("|",$pattern);
//     foreach ($back_list as $hack){
//         if (preg_match("/$hack/i",$value)) {
//             die("$hack detected");
//         }
//     }
//    return $value;
// }
?> 