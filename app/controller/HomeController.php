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
            return $this->view('login');

        }

        public function create()
        {
            $this->setLayout('layouts.app');
            return $this->view('create');

        }

        public function download()
        {
            $this->setLayout('layouts.app');
            return $this->view('reset');

        }
    }