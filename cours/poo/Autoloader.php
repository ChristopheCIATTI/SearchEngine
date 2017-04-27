<?php

spl_autoload_register(
    function ($className)
    {
        include $className . ".php";
        var_dump($className);
        exit;
}
);

$obj = new Tutorial\Poo\Francais;

var_dump($obj);
