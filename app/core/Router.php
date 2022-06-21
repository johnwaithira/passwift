<?php
    
    namespace Waithira\Passwift\app\core;
    
    use Waithira\Passwift\app\core\Request;
    use Waithira\Passwift\app\core\Response;
    use Waithira\Passwift\app\Http\Exception\Handler;
    
    
    /**
     * @property array $routes
     */
    class Router
    {
        public Response $response;
        public Request $request;
        
        public Handler $handler;
        
        public static array $routes = [];
        
        /**
         * @param Request $request
         * @param Response $response
         */
        public function __construct(Request $request, Response $response, Handler $handler)
        {
            $this->response = $response;
            $this->request = $request;
            $this->handler = $handler;
        }
        
        public function get($path, $callback)
        {
            $this->routes['get'][$path] = $callback;
        }
        
        public function post($path, $callback)
        {
            $this->routes['post'][$path] = $callback;
        }
        
        public function resolve()
        {
            
            $path = $this->request->path();
            $method = $this->request->method();
            
            $callback = $this->routes[$method][$path];
            
            
            
            if(!$callback)
            {
                return $this->handler->_404();
            }
            if(is_string($callback))
            {
                return $this->view($callback);
            }
            if(is_array($callback))
            {
                Application::$app->controller = new $callback[0]();
                $callback[0] = Application::$app->controller;
            }
            
            return call_user_func($callback,$this->request);
        }
        
        public function view($view, $params = [])
        {
            $layout = $this->layout();
            $content = $this->content($view, $params);
            
            if (!empty(Application::$app->controller->layout)) {
                return str_replace(
                    '{{ content }}',
                    $content,
                    $layout
                );
            }
            return $content;
        }
        
        public function layout()
        {
            if(!empty(Application::$app->controller->layout))
            {
                $view = implode(
                    '/',
                    explode(
                        '.',
                        Application::$app->controller->layout
                    )
                );
            }
            ob_start();
            include_once Application::$rootpath."/resources/views/$view.php";
            return ob_get_clean();
        }
        
        public function content($view, $params)
        {
            foreach($params as $key => $val)
            {
                $$key = $val;
            }
            
            ob_start();
            
            $view = implode(
                '/',
                explode(
                    '.',
                    $view
                )
            );
            include_once Application::$rootpath."/resources/views/$view.php";
            return ob_get_clean();
        }
        
        public function resources($resource, $params = []): void
        {
            foreach ($params as $key => $val)
            {
                $$key = $val;
            }
            ob_start();
            $view = implode(
                '/',
                explode(
                    '.',
                    $resource
                )
            );
            include_once /** @lang text */
                Application::$rootpath."/resources/views/$view.php";
            echo ob_get_clean();
        }
        
        public function resource($view, $params = []): void
        {
            foreach ($params as $key => $val)
            {
                $$key = $val;
            }
            ob_start();
            
            $array = explode('.', $view);
            /** @var TYPE_NAME $array */
            $ext = end($array);
            
            $newPath = str_replace(
                '.'.$ext,
                '',
                $view
            );
            $path = implode(
                '/',
                explode(
                    '.',
                    $newPath
                )
            );
            
            $view = $path.".".$ext;
            
            include_once /** @lang text */
                Application::$rootpath."/resources/$view";
            echo ob_get_clean();
        }
        
        public function redirect($path)
        {
            if($path == "/")
            {
                header('Location: /', $_SERVER['PHP_SELF'], 301,);
            }
            else
            {
                $path = implode('/', explode('.', $path));
                
                header('Location: /'. $path, $_SERVER['PHP_SELF'], 301);
            }
        }
        
        /**
         * @param $view
         * @param array $params
         * @return array|bool|string
         */
        public function intended($view, array $params = []): array|bool|string
        {
            
            return $this->view($view, $params);
        }
        
    }