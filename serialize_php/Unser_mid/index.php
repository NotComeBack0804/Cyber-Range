<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit();
}
highlight_file(__FILE__);
class Hyyy_true{
    public $pyload;
    function get_flag(){
       eval($this->pyload);
    }
    public function __get($ture){
        $this->get_flag();
    }
    
}
class Hyyy_false{
    public $AAA;
    function get_flag(){
        echo 'plz_check_your_girlfriend';
    }
    public function __get($key){
        $this->get_flag();
    }
}
class Tools{
    public $NNN;
    public $HHH;
    public function __destruct(){
        return $this->NNN->HHH;
    }
}
if(isset($_GET['Hyyyy'])){
    unserialize($_GET['Hyyyy']);
}else{   
    echo "Do_you_want_me?";
}
?>