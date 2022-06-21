<?php
    
    namespace Waithira\Passwift\app\Http\Exception;
    
    use Waithira\Passwift\app\core\Application;
    use Waithira\Passwift\app\core\Controller;
    
    class Handler extends Controller
    {
        /**
         * @return bool|array|string
         */
        public function _404(): bool|array|string
        {
            Application::$app->controller->setLayout('layouts.app');
            Application::$app->router->resources('layouts.navigation');
            Application::$app->router->response->setResposeCode(404);
            return $this->view('errors.404');
        }
    }