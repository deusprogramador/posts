<?php

class Inferno{
    static public $pessoas=[];
}
class Paraiso{
    static public $pessoas=[];
}

class Terra{
    static public $pessoasVivas=[];
    static public $pessoasMortas=[];
}
class Pessoa{
    public $nome="";
    public function __construct($arg){
        $this->nome = $arg;
    }
}

array_push(Terra::$pessoasVivas,new Pessoa("Joao"), new Pessoa("Maria"), new Pessoa("Bruna"), new Pessoa("Diogo"), new Pessoa("Judas"));
array_push(Terra::$pessoasMortas,new Pessoa("XXXX"), new Pessoa("YYYYY"), new Pessoa("ZZZZ"));

class Jesus extends Deus implements Homem
{
    public function julgar (Pessoa $alvo)
            {
                if (Deus::perdoa($alvo)) {
                    array_push(Paraiso::$pessoas, $alvo);
                }
                else
                {
                    array_push(Inferno::$pessoas, $alvo);
                }
            }
} 
$julgamento_final = function (Pessoa $alvo) {
    $FilhodeDeus = Deus::getJesus(Terra::$pessoasMortas);
    return $FilhodeDeus->julgar($alvo);
};
array_map($julgamento_final,array_merge(Terra::$pessoasVivas , Terra::$pessoasMortas));
