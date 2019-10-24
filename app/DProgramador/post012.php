<?php
class Pessoa {
    public $fogoInferno=0;
}
class Cristao extends Pessoa{
    protected $refInimigos=[];
    public function addEnemy(Pessoa $enemy)
    {
        $this->refInimigos[]=$enemy;
    }
    public function tratarBem(Pessoa $alvo){
        if ( in_array($alvo,$this->refInimigos)) {
            $alvo->fogoInferno++;
        }
    }
}



$Pessoa1 = new Pessoa;
$Pessoa2 = new Pessoa;
$Pessoa3 = new Pessoa;
$cristao = new Cristao;
$cristao->addEnemy($Pessoa1);
$cristao->addEnemy($Pessoa2);
$cristao->tratarBem($Pessoa1);
$cristao->tratarBem($Pessoa2);
$cristao->tratarBem($Pessoa3);
echo $Pessoa1->fogoInferno . "\n";
echo $Pessoa2->fogoInferno . "\n";
echo $Pessoa3->fogoInferno . "\n";
