<?php
    namespace Waithira\Passwift\app\controller;
    
    use Waithira\Passwift\app\core\Controller;
    use Waithira\Passwift\app\core\Request;
    use Waithira\Passwift\app\core\Application;
    use Waithira\Passwift\app\model\Auth;

    
    class AuthController extends Controller
    {
        public function login(Request $request)
        {
            $login = new Auth(Application::$app->db);
            if($login->user_login($request->inputs()))
            {
                return "ok";
            }
        }

        public function create_account(Request $request)
        {
            $create = new Auth(Application::$app->db);
            if($create->create_account($request->inputs())){
                return "ok";
            }
        }
    }
