<?php
    
    /*
    |-------------------------------------------------------------
    |Load Auto Loader
    |-------------------------------------------------------------
    |
    |
    */
    
    
    require_once __DIR__."/../vendor/autoload.php";
    
    /*
    |-------------------------------------------------------------
    |Load Enviroment /.env file
    |-------------------------------------------------------------
    |
    |
    */
    
    $dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();
    
    /*
    |-------------------------------------------------------------
    |Load Database variables
    |-------------------------------------------------------------
    |
    |
    */
    
    $config = [
        'dsn' => $_ENV['DB_TYPE'].":host=".$_ENV['DB_HOST'].";port=".$_ENV['DB_PORT'].";dbname=".$_ENV['DB_NAME'],
        'pwd' => $_ENV['DB_PWD'],
        'user' => $_ENV['DB_USER']
    ];
    
    
    use Waithira\Passwift\app\core\Application;
    
    /*
    |-------------------------------------------------------------
    |Instantiate Application
    |-------------------------------------------------------------
    |
    |
    */
    
    $app = new Application(dirname(__DIR__), $config);
    
    
    /*
    |-------------------------------------------------------------
    |Load/ Include Routes from web.php file
    |-------------------------------------------------------------
    |
    |
    */
    require_once __DIR__."/../route/web.php";
    
    /*
    |-------------------------------------------------------------
    |Run Application
    |-------------------------------------------------------------
    |
    |
    */
    
    $app->run();