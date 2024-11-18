<?php
highlight_file(__FILE__);

class Begin{
    public $name;

    public function __destruct()               
    {
        if(preg_match("/[a-zA-Z0-9]/",$this->name)){      
            echo "Hello";
        }else{
            echo "Welcome to NewStarCTF 2023!";
        }
    }
}

class Then{
    private $func;

    public function __toString(){
        ($this->func)();  
    }

}

class Handle{
    protected $obj;

    public function __call($func, $vars) 
    {
        $this->obj->end();               
    }

}

class Super{
    protected $obj;
    public function __invoke()      
    {
        $this->obj->getStr();         
    }

    public function end()
    {
        die("==GAME OVER==");
    }
}

class CTF{
    public $handle;                     

    public function end()                 
    {
        unset($this->handle->log);     
    }

}

class WhiteGod{
    public $func;
    public $var;

    public function __unset($var)         
    {
        ($this->func)($this->var);       
    }
}

@unserialize($_GET['Hyyy']);	
?>
