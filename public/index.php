<?php

    require_once __DIR__."/../vendor/autoload.php";
    
    use Waithira\Passwift\database\Database;
    $app = new Database();
    var_dump($app);
    
?>