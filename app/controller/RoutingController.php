<?php
    namespace Waithira\Passwift\app\controller;
    
    use Waithira\Passwift\app\core\Controller;
    
    class RoutingController extends Controller
    {
        public function identify()
        {
            return $this->view('identify');
        }
    }