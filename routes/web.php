<?php
    
    use Waithira\Passwift\app\controller\HomeController;
    use Waithira\Passwift\app\route\Route;
    
    Route::get('/', [HomeController::class, 'index']);