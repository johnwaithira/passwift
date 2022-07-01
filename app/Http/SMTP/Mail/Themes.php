<?php

namespace Waithira\Passwift\app\Http\SMTP\Mail;

use Waithira\Passwift\app\core\Application;

class Themes
{
    public $new = "";
    public static $notification = "
         <div>
            <p>
                You\'ve received this email because you created an account with us and are signed up to receive email updates from Passwift.
            </p>
        </div>";
    public function __contruct()
    {
        
    }
    public static function New()
    {
        return self::$new;
    }
    public static function Notification()
    {
        return self::$notification;
    }


}

