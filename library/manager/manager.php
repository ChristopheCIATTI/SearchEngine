<?php

namespace Lib\Manager;

use PDO;

class Manager {
    
    /**
     * @var Singleton
     * @access private
     * @static
     */
    private static $instance;
    private $dbh;
    private $credential;
    
    /**
     * Constructeur de la classe
     *
     * @param void
     * @return void
     */
    private function __construct() 
    {
        $this->credential = [
            "driver" => "mysql:host=localhost",
            "dbname" => "search_engine",
            "charset" => "utf8",
            "username" => "root",
            "password" => "",
        ];
    }
    
    /**
     * Méthode qui crée l'unique instance de la classe
     * si elle n'existe pas encore puis la retourne.
     *
     * @param void
     * @return Singleton
     */
    public static function getInstance(): Manager 
    {
        if(is_null(self::$instance)) {
            self::$instance = new Manager();
        }
        return self::$instance;
    }
    public static function getPdo()
    {
        if (null === self::getInstance()->dbh) {
            self::$instance->dbh = new \PDO(
                self::$instance->credential["driver"] . 
                "; dbname="
                .self::$instance->credential["dbname"]. 
                "; charset="
                .self::$instance->credential["charset"],
                self::$instance->credential["username"],
                self::$instance->credential["password"], [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
                ]);
        }
        return self::$instance->dbh;
    }
}
