<?php

function auth_render(){
    $res = false;
    $formLogin = '';
    $formPassword = '';
    $typeInputLogin = '';
    $classLabel = '';

    if(isset($_POST['auth'])){
        $logins = include $_SERVER['DOCUMENT_ROOT'].'/data/logins.php';
        $passwords = include $_SERVER['DOCUMENT_ROOT'].'/data/passwords.php';
        $formLogin = htmlspecialchars($_POST['login'], ENT_QUOTES);
        $formPassword = htmlspecialchars($_POST['password'], ENT_QUOTES);
        $flip = array_flip($logins);
        $res = isset($flip[$formLogin]) && $passwords[$flip[$formLogin]] == $formPassword;

        if($res){
            $_SESSION['user'] = $formLogin;
        }

    }

    if(isset($_COOKIE['login']) && !isset($_SESSION['user'])){
        $typeInputLogin = 'hidden';
        $formLogin = $_COOKIE['login'];
        $classLabel = 'none';
    }

    include $_SERVER['DOCUMENT_ROOT'].'/templates/auth_form.php';

}

