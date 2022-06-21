<?php
    
    namespace Waithira\Passwift\app\Http\Security;
    
    class Hash
    {
        /**
         * @param $data
         * @return string
         */
        public static function make($data): string
        {
            return Cipher::Encrypt($data);
        }
    
        public static function decrypt($data): bool|string
        {
            return Cipher::Decrypt($data);
        }
    }