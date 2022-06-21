<?php

namespace Waithira\Passwift\app\Http;

use Waithira\Passwift\app\Http\Security\Cipher;

session_start();
class CSRF
{
    /**
     * @return void
     */
    public static function csrf_token(): void
    {
        $token = Cipher::Encrypt(md5(time()));
        $_SESSION['csrf_token'] = $token;

        echo sprintf("<input name='csrf_token' id='token' value='%s' type= 'hidden'>", $token);
    }
    
    /**
     * @param $token
     * @return bool
     */
    public static function validate($token): bool
    {
        return isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $token;
    }
}