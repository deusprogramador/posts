<?php
class Opiniao
{
    public const SUPER_IMPORTANTE = 32;
    public const IMPORTANTE = 16;
    public const CONSIDERAVEL = 8;
    public const DESPREZIVEL = 2;
    public const DE_MERDA = 1;
    public $origem;
} 
class Pessoa {
    public $iDaRazao=5;
    public $iDoFodase=60;
    public $idade;
    public function ValorOpiniao(Opiniao $op)
    {
        if ($op->origem === $this) {return Opiniao::SUPER_IMPORTANTE;}
        if ($this->idade< $this->iDaRazao) {return 0;}
        if ($this->idade>= $this->iDoFodase) 
        { 
            $valor = Opiniao::DE_MERDA;
        }else {
            $valor = Opiniao::SUPER_IMPORTANTE / (2**floor(($this->idade-$this->iDaRazao) / floor(($this->iDoFodase-$this->iDaRazao)/ 5)));
        }
        if ($valor & (Opiniao::DE_MERDA | Opiniao::DESPREZIVEL)) {echo 'FODA-SE';}
        if ($valor & (Opiniao::SUPER_IMPORTANTE | Opiniao::IMPORTANTE)) {echo 'I LOVE YOU';}
        return $valor;
    }
}


$pessoa = new Pessoa();
$opiniao = new Opiniao();
$pessoa->idade = 50;
//$opiniao->origem = $pessoa;
$ret = $pessoa->ValorOpiniao($opiniao);
echo "\n".$ret;