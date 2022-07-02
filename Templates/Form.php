<?php

namespace Waithira\Passwift\Templates;

class Form
{
    public static function begin($action, $method, $params = []): Form
    {
        echo sprintf('<form  action="%s" id="form" method = "%s" class=" p-10 m-t-20" %s enctype="multipart/form-data">',
        $action, $method, $params);
        return new Form();
    }
    public static function end()
    {
        echo "</form>";
    }

    public static function field($attribute)
    {
        return new Fields($attribute);
    }

}