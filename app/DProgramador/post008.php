<?php
class Deus {
    public static $bencaos=[];
}
class podProgramar
{
    public $episodio;
    public function __construct($episodio) {
        $this->episodio = $episodio;
    }
}


$novo_episodio = new podProgramar(65);
if ($novo_episodio->foiPublicado()) {
    Deus::abencoar($novo_episodio);
    echo "Eu vi que era bom!";
}
