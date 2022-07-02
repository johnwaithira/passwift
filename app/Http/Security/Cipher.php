<?php
    
    namespace Waithira\Passwift\app\Http\Security;
    
    define("ciphering", "AES-128-CTR");
    define("encryption_key", "873744b4803834e4");
    define("encryption_iv","1122224499112243");
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