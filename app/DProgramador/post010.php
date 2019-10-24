<?php
class Realidade {
    public static function EhRacismo ($contexto,$raca1, $raca2)
    {
        $pessoa1 = new $raca1;
        $pessoa2 = new $raca2;
        return (!(
            $contexto->valorSocial($pessoa1)        == $contexto->valorSocial($pessoa2) &&
            $contexto->legislacao($pessoa1)         == $contexto->legislacao($pessoa2) &&
            $contexto->cotasConcursos($pessoa1)     == $contexto->cotasConcursos($pessoa2) 
            /*Cabem mais comparações aqui*/
        ));
    }
}

