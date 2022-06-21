<?php
    
    namespace Waithira\Passwift\app\Http\Format\Generator;
    
    class Rand
    {
        /**
         * @throws \Exception
         */
        public static function make($len): string
        {
            return bin2hex(random_bytes($len));
        }
    
        public static function number($min_len, $max_len): int
        {
            return rand($min_len, $max_len);
        }
    }