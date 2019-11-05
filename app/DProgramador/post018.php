<?php
class Oracao
{
    protected static $pedidos = [];
    public static function request($pedido)
    {
        self::$pedidos[] = $pedido;
    }
    protected function resolverOracoes()
    {
        foreach(self::$pedidos as $pedido)
        {
            switch (get_class($pedido))
            {
                case "PassarENEM":
                    ($pedido->pessoa->estudouBem()? $pedido->aceitar() : $pedido->negar());
                    break;                    
                case "Cura":
                    (Deus::random($pedido->pessoa)? $pedido->aceitar() : $pedido->negar());
                    break;
                case "SalvarCasamento":
                    $pedido->negar();//Se chegou no ponto de orar, então já era
            }
        }
    }
}

