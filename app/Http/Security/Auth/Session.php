<?php
    
    namespace Waithira\Passwift\app\Http\Security\Auth;
    session_start();
    class Session
    {
        public static function setSession($session_id)
        {
            return $_SESSION['passwift_user'] = $session_id;
        }
    
        public static function checksession()
        {
            return isset($_SESSION['passwift_user']) && !empty($_SESSION['passwift_user']);
        }
    
        public static function flush()
        {
           session_destroy();
        }
        public static function clean($name)
        {
            unset($_SESSION[$name]);
        }
    
        public static function set($name, $params = [])
        {
            session_start();
            return $_SESSION[$name] = $params;
        }
    
        public static function get($name)
        {
            return $_SESSION[$name];
        }
    
        public static function user()
        {
            return Session::get('passwift_user');
        }
    }