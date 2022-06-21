<?php
    
    namespace Waithira\Passwift\app\Http\Security;
    
    define("ciphering", "AES-128-CTR");
    define("encryption_key", "873744b4765fef04fe55d758b88038e4");
    define("encryption_iv","123456789123456789");
    define("option", 0);
    
    class Cipher
    {
        
        public static function Encrypt($data): bool|string
        {
            return openssl_encrypt($data,
                ciphering,
                encryption_iv,
                option,
                encryption_key
            );
        }
    
        public static function Decrypt($data): bool|string
        {
            return openssl_decrypt($data,
                ciphering,
                encryption_iv,
                option,
                encryption_key
            );
        }

    }