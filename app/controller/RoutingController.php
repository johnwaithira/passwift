<?php
    namespace Waithira\Passwift\app\controller;
    
    use Waithira\Passwift\app\core\Controller;
    
    class RoutingController extends Controller
    {
        public function index()
        {
            return $this->view('home');
        }
    }