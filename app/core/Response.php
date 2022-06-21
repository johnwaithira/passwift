<?php
    
    namespace Waithira\Passwift\app\core;
    
    class Response
    {
        /**
         * @param $code
         * @return void
         */
        public function setResposeCode($code): void
        {
            http_response_code($code);
        }
    
    }