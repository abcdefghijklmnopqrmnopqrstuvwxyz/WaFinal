<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
        <?php
            $site = $_SESSION['site'];
            
            switch ($site) {
                case '/pages/home.php':
                    echo "Online artworks - Main Menu";
                    break;
                case '/pages/about.php':
                    echo "About us";
                    break;
                case '/pages/gallery.php':
                    echo "Virtual Gallery";
                    break;
                case '/pages/login.php':
                    if (isset($_SESSION["logged"])) {
                        if ($_SESSION["logged"] == "false") {
                            echo "Virtual Gallery - Login";
                            break;
                        }
                    }
                    echo "Virtual Gallery - Logout";
                    break;
                case '/pages/logout.php':
                    if (isset($_SESSION["logged"])) {
                        if ($_SESSION["logged"] == "true") {
                            echo "Virtual Gallery - Logout";
                            break;
                        }
                    }
                    echo "Virtual Gallery - Login";
                    break;
                case '/pages/logged.php':
                    echo "Virtual Gallery - Register";
                    break;
                case '/pages/register.php':
                    echo "Virtual Gallery - Register";
                    break;
                default:
                    echo "Error - Page not found";
                    break;
            }
        ?>
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Inter&family=Noto+Sans+Display:wght@300&family=Open+Sans:ital,wght@1,300&family=PT+Sans&family=Poppins:wght@300&family=Rubik&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </head>
    <body class="<?= $_SESSION['site'] === '/pages/home.php' ? 'backgr mouse' : '' ?>" id="<?= $_SESSION['site'] === '/pages/home.php' ? 'mouse' : '' ?>">
        <header class="head z-2">
            <div class="d-flex bg-dark justify-content-center">
                <a class="d-xl-none d-flex text-decoration-none">
                    <button class="navbar-toggler collapsed" data-bs-toggle="collapse" data-bs-target="#navbar">
                        <div class="d-flex text-center py-3 px-4 fs-3 text-primary align-items-center">
                            <span class="material-symbols-outlined d-block fs-1 p-1">Menu</span>
                            <span class="px-2 fs-1">Menu</span>
                        </div>
                    </button>
                </a>
            </div>
            <nav class="bg-dark d-xl-flex nav navbar-collapse collapse" id="navbar">
                <div class="d-xl-flex d-block pb-2 container">
                    <hr class="line">
                    <a href="/pages/home" class="d-block text-decoration-none p-xl-0 p-1 hover<?= $_SESSION['site'] === '/pages/home.php' ? 'active' : '' ?>">
                        <div class="d-flex text-center py-3 px-4 text-<?= $_SESSION['site'] === '/pages/home.php' ? 'primary' : 'light' ?> justify-content-center align-items-center">
                            <span class="material-symbols-outlined d-block fs-2 p-1">Home</span>
                            <span class="px-2 fs-3">Home</span>
                        </div>
                        <div class="navdes<?= $_SESSION['site'] === '/pages/home.php' ? 'active' : '' ?>"></div>
                    </a>
                    <a href="/pages/about" class="d-block text-decoration-none p-xl-0 p-1 hover<?= $_SESSION['site'] === '/pages/about.php' ? 'active' : '' ?>">
                        <div class="d-flex text-center py-3 px-4 text-<?= $_SESSION['site'] === '/pages/about.php' ? 'primary' : 'light' ?> justify-content-center align-items-center">
                            <span class="material-symbols-outlined d-block fs-2 p-1">Help</span>
                            <span class="px-2 fs-3">About us</span>
                        </div>
                        <div class="navdes<?= $_SESSION['site'] === '/pages/about.php' ? 'active' : '' ?>"></div>
                    </a>
                    <a href="/pages/gallery" class="d-block text-decoration-none p-xl-0 p-1 hover<?= $_SESSION['site'] === '/pages/gallery.php' ? 'active' : '' ?>">
                        <div class="d-flex text-center py-3 px-4 text-<?= $_SESSION['site'] === '/pages/gallery.php' ? 'primary' : 'light' ?> justify-content-center align-items-center">
                            <span class="material-symbols-outlined d-block fs-2 p-1">Photo_library</span>
                            <span class="px-2 fs-3">Virtual gallery</span>
                        </div>
                        <div class="navdes<?= $_SESSION['site'] === '/pages/gallery.php' ? 'active' : '' ?>"></div>
                    </a>
                    <a href="/pages/login" class="d-<?= $_SESSION['logged'] === 'false' ? 'block' : 'none' ?> text-decoration-none ms-xl-auto p-xl-0 p-1 hover<?= $_SESSION['site'] === '/pages/login.php' ? 'active' : '' ?>">
                        <div class="d-flex text-center py-3 px-4 text-<?= $_SESSION['site'] === '/pages/login.php' ? 'primary' : 'light' ?> justify-content-center align-items-center">
                            <span class="material-symbols-outlined d-block fs-2 p-1">Login</span>
                            <span class="px-2 fs-3">Log in</span>
                        </div>
                        <div class="navdes<?= $_SESSION['site'] === '/pages/login.php' ? 'active' : '' ?>"></div>
                    </a>
                    <a href="/pages/logout" class="d-<?= $_SESSION['logged'] === 'true' ? 'block' : 'none' ?> text-decoration-none ms-xl-auto p-xl-0 p-1 hover<?= $_SESSION['site'] === '/pages/logout.php' ? 'active' : '' ?>">
                        <div class="d-flex text-center py-3 px-4 text-<?= $_SESSION['site'] === '/pages/logout.php' ? 'primary' : 'light' ?> justify-content-center align-items-center">
                            <span class="material-symbols-outlined d-block fs-2 p-1">Login</span>
                            <span class="px-2 fs-3">Log out</span>
                        </div>
                        <div class="navdes<?= $_SESSION['site'] === '/pages/logout.php' ? 'active' : '' ?>"></div>
                    </a>
                    <a href="/pages/register" class="d-<?= $_SESSION['logged'] === 'false' ? 'block' : 'none' ?> text-decoration-none p-xl-0 p-1 hover<?= $_SESSION['site'] === '/pages/register.php' ? 'active' : '' ?>">
                        <div class="d-flex text-center py-3 px-4 text-<?= $_SESSION['site'] === '/pages/register.php' ? 'primary' : 'light' ?> justify-content-center align-items-center">
                            <span class="material-symbols-outlined d-block fs-2 p-1">How_to_reg</span>
                            <span class="px-2 fs-3">Sign in</span>
                        </div>
                        <div class="navdes<?= $_SESSION['site'] === '/pages/register.php' ? 'active' : '' ?>"></div>
                    </a>
                    <a href="/pages/logged" class="d-<?= $_SESSION['logged'] === 'true' ? 'block' : 'none' ?> text-decoration-none p-xl-0 p-1 hover<?= $_SESSION['site'] === '/pages/logged.php' ? 'active' : '' ?>">
                        <div class="d-flex text-center py-3 px-4 text-<?= $_SESSION['site'] === '/pages/logged.php' ? 'primary' : 'light' ?> justify-content-center align-items-center">
                            <span class="material-symbols-outlined d-block fs-2 p-1">How_to_reg</span>
                            <span class="px-2 fs-3">Sign in</span>
                        </div>
                        <div class="navdes<?= $_SESSION['site'] === '/pages/logged.php' ? 'active' : '' ?>"></div>
                    </a>
                </div>
            </nav>
            <div class="position-fixed pt-4 pe-sm-5 pe-2 toastpos d-none d-md-flex">
                <div class="container toast align-items-center border-0 float-end bg-dark" id="toast">
                    <div class="d-flex">
                        <div class="toast-body text-white toasttext">
                            Welcome to our virtual gallery, don't forget to look at <a href="./about">About us</a>.
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </header>