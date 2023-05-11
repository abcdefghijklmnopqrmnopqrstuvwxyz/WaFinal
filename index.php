<?php

session_start();

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        $redirect = '/pages/home.php';
        break;
    case '/home':
        $redirect = '/pages/home.php';
        break;
    case '/pages/about':
        $redirect = '/pages/about.php';
        break;
    case '/pages/gallery':
        $redirect = '/pages/gallery.php';
        break;
    case '/pages/login':
        if (isset($_SESSION['logged'])) {
            if ($_SESSION['logged'] == 'false') {
                $redirect = '/pages/login.php';
                break;
            }
        }
        $redirect = '/pages/logout.php';
        break;
    case '/pages/register':
        if (isset($_SESSION['logged'])) {
            if ($_SESSION['logged'] == 'true') {
                $redirect = '/pages/logged.php';
                break;
            }
        }
        $redirect = '/pages/register.php';
        break;
    default:
        require __DIR__ . '/pages/errors/404.php';
        exit();
}

$_SESSION['site'] = $redirect;

if (!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = 'false';
}


require_once __DIR__ . '/pages/cores/header.php';
require_once __DIR__ . $redirect;
require_once __DIR__ . '/pages/cores/footer.php';

?>