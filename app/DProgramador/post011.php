<?php
class Deus{
    public static function permite($nome, $argumentos){
        return true;
    }
}
class Realidade {
    public static function __callStatic($name, $arguments)
    {
        if (Deus::permite($name,$arguments)){
            Realidade::$name($arguments);
        }else{
            echo "Deus proíbe";
        }
    }
}




/* private static function teste($valor1, $valor2){
    echo $valor1+$valor2;
} */
Realidade::teste(4,2);