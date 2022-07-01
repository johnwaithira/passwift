<?php
    
    use Waithira\Passwift\app\controller\HomeController;
use Waithira\Passwift\app\controller\RoutingController;
use Waithira\Passwift\app\route\Route;
use Waithira\Passwift\app\core\Request;
    
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/generate', [HomeController::class, 'generator']);
    Route::get('/account/identify', [RoutingController::class, 'identify']);
    Route::get('/recover/initiate', [RoutingController::class, 'initiate']);
    Route::get('/login', [HomeController::class, 'login']);
    Route::get('/signup', [HomeController::class, 'create']);

    Route::get('/download', [HomeController::class, 'download']);

    Route::post('/user/login', function(Request $request){
        var_dump($request->inputs());
    });
