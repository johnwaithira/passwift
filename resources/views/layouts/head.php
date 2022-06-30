<?php
use Waithira\Passwift\app\core\Application;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/popup.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/storage/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/storage/android-chrome-192x192.png" type="image/x-icon">
    <link rel="shortcut icon" href="/storage/android-chrome-512x512.png" type="image/x-icon">
    <link rel="shortcut icon" href="/storage/apple-touch-icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/storage/favicon-32x32.png" type="image/x-icon">
    <link rel="shortcut icon" href="/storage/favicon-16x16.png" type="image/x-icon">
</head>
<body>
<?php
    Application::$app->router->resources('includes.popup');
    Application::$app->router->resources('form.preventrefresh');
?>