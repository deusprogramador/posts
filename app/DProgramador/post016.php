<?php
class Jave {
    protected static $instance;
    public $nome;
    private function __construct(){
        $this->nome = __CLASS__;
    }
    public static function getInstance()
    {
        if (!self::$instance){ 
           self::$instance = new self();
        }
        return self::$instance;
    }
}
class Zeus {
    protected static $instance;
    public $nome;
    private function __construct(){
        $this->nome = __CLASS__;
    }
    public static function getInstance()
    {
        if (!self::$instance){ 
           self::$instance = new self();
        }
        return self::$instance;
    }
}
class Thor {
    protected static $instance;
    public $nome;
    private function __construct(){
        $this->nome = __CLASS__;
    }
    public static function getInstance()
    {
        if (!self::$instance){ 
           self::$instance = new self();
        }
        return self::$instance;
    }
}
class Deuses {
    public static function getJave(){
        return Jave::getInstance();
    }
    public static function getZeus(){
        return Zeus::getInstance();
    }
    public static function getThor(){
        return Thor::getInstance();
    }
}

class Humano {

}
class Mulher extends Humano {
    public $deusesAdorados;
}
interface iProfeta{

}
class Salomao extends Humano implements iProfeta{
    public $sabedoria = ENORME;
    protected $mulheres;
    protected $deusesAdorados;
    public function __construct()
    {
        $this->deusesAdorados[Deuses::getJave()->nome] = Deuses::getJave();
    }
    public function add($nova)
    {
        $this->mulheres[] = $nova;
        $this->deusesAdorados = array_merge($this->deusesAdorados,$nova->deusesAdorados);
    }
}



$mulher1 = new Mulher();
$mulher2 = new Mulher();
$mulher3 = new Mulher();
$mulher4 = new Mulher();

$mulher1->deusesAdorados = [Deuses::getThor()->nome => Deuses::getThor(),Deuses::getZeus()->nome => Deuses::getZeus()];
$mulher2->deusesAdorados = [Deuses::getZeus()->nome => Deuses::getZeus()];
$mulher3->deusesAdorados = [Deuses::getThor()->nome => Deuses::getThor(),Deuses::getJave()->nome => Deuses::getJave()];
$mulher4->deusesAdorados = [Deuses::getThor()->nome => Deuses::getThor()];

$Rei = new Salomao();
$Rei->add($mulher1);
$Rei->add($mulher2);
$Rei->add($mulher3);
$Rei->add($mulher4);
echo "fim";