<?php
    
    namespace Waithira\Passwift\app\Http\Security;
    
    use Waithira\Passwift\app\core\Request;
    use Waithira\Passwift\app\Http\CSRF;

    class Validate
    {
        
        public static function csrf(): bool
        {
            $request = new Request();
            if(CSRF::validate($request->inputs()['csrf_token']))
            {
                return true;
            }
            return false;
        }
        
    }