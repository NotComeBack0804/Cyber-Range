<?php
class Hyyy {
    public $payload;
    function get_flag(){
        eval($this->payload);
    }
    public function __destruct(){
        $this->get_flag();
    }
    
}
if(isset($_GET['Hyyyy'])){
    unserialize($_GET['Hyyyy']);
}else{   
    highlight_file(__FILE__);
}
?>