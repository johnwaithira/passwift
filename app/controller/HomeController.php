<?php
    
    namespace Waithira\Passwift\app\controller;
    use Waithira\Passwift\app\core\Controller;
    
    class HomeController extends Controller
    {
        public function index()
        {
            return $this->view('home');
        }
        public function generator()
        {
            $this->setLayout('layouts.app');
            return $this->view('generate');

        }

        public function login()
        {
            $this->setLayout('layouts.app');
            return $this->view('generate');

        }
    }