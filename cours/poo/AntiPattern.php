<?php

namespace Formation\Poo;

class AntiPattern
{
    private static $instance;
    
    private function __construct()
    {
        
    }
    public static function getInstance(): AntiPattern
    {
        echo "je veux";
        var_dump(self::$instance);
        if (null === self::$instance) {
            echo "NULL";
            self::$instance = new AntiPattern;
        }
        return self::$instance;
        exit;
    }
}