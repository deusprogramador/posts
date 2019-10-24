<?php
class Person {
    protected $Parent;
    protected $AntiVax;
    public $ID;
    public function __construct ($Parent, $AntiVax){
        $this->Parent = $Parent;
        $this->AntiVax = $AntiVax;
        $this->ID = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
    public function getParent()
    {
        return $this->Parent;
    }
    public function isAntiVax()
    {
        return $this->AntiVax;
    }
}
class Hell {
    public $Fila=[];
    public $Condenados=[];
    public function addDeathListener(Person $maluco, $listener)
    {
        $this->Fila[$maluco->ID] = $listener;
    }
    public function add(Person $Condenado)
    {
        $this->Condenados[]=$Condenado;
    }
}
class Heaven 
{
    public $Salvos=[];
    public function add(Person $Salvo)
    {
        $this->Salvos[]=$Salvo;
    }
    
}
class FinalJudgement {
    protected static $Heaven;
    protected static $Hell;
    public static function getHell()
    {
        if (!self::$Hell) {
            self::$Hell = new Hell();
        }
        return self::$Hell;
    }
    public static function getHeaven()
    {
        if (!self::$Heaven) {
            self::$Heaven = new Heaven();
        }
        return self::$Heaven;
    }

    public static function kill(Person $maluco) {
        (self::$Hell->Fila[$maluco->ID])($maluco);
    }
    
}
$pai = new Person(null, true);
$child = new Person($pai, false);

if ($child->getParent()->isAntiVax()) {
    FinalJudgement::getHell()->addDeathListener($child->getParent(),  function (Person $crazyParent)
                                                                    {
                                                                        FinalJudgement::getHell()->add($crazyParent);
                                                                    } );
    FinalJudgement::getHeaven()->add($child);
}
FinalJudgement::kill($pai);
echo var_dump(FinalJudgement::getHell()->Condenados);