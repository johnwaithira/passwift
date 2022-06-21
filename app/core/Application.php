<?php
    
    namespace Waithira\Passwift\app\core;
    
    use Waithira\Passwift\database\Database;

    class Application
    {
        public Response $response;
        public Request $request;
        public Router $router;
    
        /**
         * @var
         */
        public static $rootpath;
    
        public static Application $app;
    
        public Controller $controller;
        public Database $db;
        public Handler $handler;
    
        /**
         * @param $path
         * @param $config
         */
        public function __construct($path, $config)
        {
            self::$rootpath = $path;
            self::$app = $this;
            $this->db  = new Database($config);
            $this->request = new Request();
            $this->response = new Response();
            $this->controller = new Controller();
            $this->handler = new Handler();
            $this->router = new Router($this->request, $this->response, $this->handler);
        }
        /**
         * @return void
         */
        public function run(): void
        {
            /** @var  $this */
            echo $this->router->resolve();
        }
    }