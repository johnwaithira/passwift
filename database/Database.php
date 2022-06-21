<?php
    
    namespace Waithira\Passwift\database;
    
    class Database
    {
        public $pdo = null;
        
        public function __construct($config)
        {
            try
            {
                $this->pdo = new \PDO($config['dsn'],  $config['user'], $config['pwd']);
                $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
                
            }
            catch(\Exception $exception)
            {
                echo "<pre>";
                var_dump($exception);
                echo "</pre>";
            }
        }
    }