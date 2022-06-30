<?php
    namespace Waithira\Passwift\app\controller;
    
    use Waithira\Passwift\app\core\Controller;
    
    class RoutingController extends Controller
    {
        public function identify()
        {
            $this->setLayout('layouts.app');
            return $this->view('identify');
        }

        public function initiate()
        {
            $this->setLayout('layouts.app');
            return $this->view('initiate');
        }
    }