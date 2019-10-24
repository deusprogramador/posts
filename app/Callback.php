<?php
class ClassName 
{
    public function __invoke($var1,$var2 = null)
    {
        if ($var1 && $var2) {
            echo 'Chamou callback: ' .$var2;
        }else
        {
            $this->callback2($var1);
        }
        
    }
    public function callback2($var1)
    {
        if ($var1) {
            echo 'Chamou callback com 1 parametro';
        
        }
        
    }

    
}

class ClassName2 
{
    static public $funcao;
    static public function teste($var = null)
    {
        self::$funcao = $var;
        $var(true, 'teste');
        self::$funcao(true, 'teste2');
    }

    public $funcao2;
    public function preparacallback($var = null)
    {
        $this->funcao2 = $var;
    }    
    public function chamada($arg1,$arg2)
    {
        $var = $this->funcao2;
        return ($this->funcao2)($arg1,$arg2);
        //return $var($arg1,$arg2);
        
    }
    public function __call($nome, $args)
    {
        if ($nome=='funcao2'){
            return ($this->funcao2)($args[0],$args[1]);
        }
    }

}

$c = new ClassName;
$c(true,"TESTE DIRETO\n");
//call_user_func($c,true,'Parametro 2');
//call_user_func($c,true);

//ClassName2::teste($c);
//ClassName2::$funcao(true, 'TESTE do Callback');
$c2 = new ClassName2;
$c2->preparacallback($c);
$c2->funcao2(true, 'TESTE maluco 2');
($c2->funcao2)(true, 'TESTE maluco 2');

?>