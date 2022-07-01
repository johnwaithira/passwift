<?php
    
    use Waithira\Passwift\app\controller\HomeController;
use Waithira\Passwift\app\controller\RoutingController;
use Waithira\Passwift\app\route\Route;
    
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/generate', [HomeController::class, 'generator']);
    Route::get('/account/identify', [RoutingController::class, 'identify']);
    Route::get('/recover/initiate', [RoutingController::class, 'initiate']);
    Route::get('/login', [HomeController::class, 'login']);