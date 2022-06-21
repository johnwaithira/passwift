<?php
    
    namespace Waithira\Passwift\app\core;
    
    class Request
    {
        /**
         * @return mixed|string
         * @author WaithiraJohn
         * namespace Waithira\Passwift\app\core
         */
    
        public function path(): mixed
        {
            $path = $_SERVER['REQUEST_URI'] ?? '/';
            $position = strpos(
                $path,
                '?'
            );
        
            /** @var $position */
            return $position === false ? $path : substr(
                $path,
                0,
                $position
            );
        }
    
        /**
         * @return string
         */
        public function method(): string
        {
            return strtolower($_SERVER['REQUEST_METHOD']);
        }
    
        public function inputs(): array
        {
            $body = [];
        
            foreach($_POST as $key => $val)
            {
                /** @var array $body */
                $body[$key] = filter_input(
                    INPUT_POST,
                    $key,
                    FILTER_SANITIZE_SPECIAL_CHARS
                );
            }
            return $body;
        }
        
    }