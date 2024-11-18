<?php
highlight_file(__FILE__);
error_reporting(E_ALL);
ini_set('display_errors', 1);
function filter($a)
{
    $pattern = array('\'', '"','%','\(','\)',';','bash');
    $pattern = '/' . implode('|', $pattern) . '/i';
    if(preg_match($pattern,$a)){
        die("No injecting!!!");
    }
    return $a;
}
class ENV{
    public $key;
    public $value;
    public $math;
    public function __toString()
    {
        $key=filter($this->key);
        $value=filter($this->value);
        putenv("$key=$value");
        system("cat hints.txt");
    }
    public function __wakeup()
    {
        if (isset($this->math->flag))
        {
            echo getenv("LD_PRELOAD");
            echo "YesYes";
        } else {
            echo "YesYesYes";
        }
    }
}
class DIFF{
    public $callback;
    public $back;
    private $flag;

    public function __isset($arg1)
    {
        system("cat /flag");
        $this->callback->p;
        echo "You are stupid, what exactly is your identity?";

    }

}
class FILE{
    public $filename;
    public $enviroment;
    public function __get($arg1){
        if("hacker"==$this->enviroment){
            echo "Hacker is bad guy!!!";
        }
    }
    public function __call($function_name,$value)
    {
        if (preg_match('/\.[^.]*$/', $this->filename, $matches)) {
            $uploadDir = "/tmp/";
            $destination = $uploadDir . md5(time()) . $matches[0];
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            file_put_contents($this->filename, base64_decode($value[0]));
            if (rename($this->filename, $destination)) {
                echo "文件成功移动到${destination}";
            } else {
                echo '文件移动失败。';
            }
        } else {
            echo "非法文件名。";
        }
    }
}
class FUN{
    public $fun;
    public $value;
    public function __get($name)
    {
        $this->fun->getflag($this->value);
    }
}
$c = $_POST['Harder'];
unserialize($c);

?> 