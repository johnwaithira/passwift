<?php
    
    use Waithira\Passwift\app\route\Route;
    
    Route::get('/', function (){
        var_dump($_ENV);
    });