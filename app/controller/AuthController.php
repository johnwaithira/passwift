<?php
    namespace Waithira\Passwift\app\controller;
    
    use Waithira\Passwift\app\core\Controller;
    use Waithira\Passwift\app\core\Request;

    
    class AuthController extends Controller
    {
        public function identify()
        {
            $this->setLayout('layouts.app');
            return $this->view('identify');
        }

        public function create(Request $request)
        {
           echo json_encode($request->inputs());
        }
    }