<?php
use Waithira\Passwift\app\core\Application;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://127.0.0.1/shoetailor/ke/css/style.css">
    <link rel="stylesheet" href="/css/popup.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<?php
    Application::$app->router->resources('includes.popup');
    Application::$app->router->resources('form.preventrefresh');
?>