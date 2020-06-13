<?php

if (session_status() == PHP_SESSION_NONE) {
    ini_set('session.name', 'session_id');
    ini_set('session.gc_maxlifetime', 1200);
    ini_set('session.cookie_lifetime', 1200);

    session_start();
}

if (isset($_COOKIE['login'])){
    setcookie('login', $_COOKIE['login'], time()+(40 * 24 * 60 * 60), '/');
}

if(isset($_SESSION['user']) && !isset($_COOKIE['login'])){
    setcookie('login', $_SESSION['user'], time()+(40 * 24 * 60 * 60), '/');

}

if(isset($_GET['login']) && $_GET['login'] === 'out'){
    session_unset();
    session_destroy();
    setcookie('login', null, -1, "/");
    header('Location: /');
    exit();
}
