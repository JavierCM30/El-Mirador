<?php

    include '../config/app.php';

    $uri = $_SERVER['REQUEST_URI'];

    if($uri == '/hospedaje/public/') {
        require_once "../views/inicio.php";
    }elseif($uri == '/hospedaje/public/restaurante/') {
        require_once "../views/restaurante.php";
    }elseif($uri == '/hospedaje/public/tours/') {
        require_once "../views/tours.php";
    } elseif($uri == '/hospedaje/public/habitaciones/') {
        require_once "../views/habitaciones.php";
    }elseif($uri == '/hospedaje/public/perfil/') {
        require_once "../views/perfil.php";
    }elseif($uri == '/hospedaje/public/login/') {
        require_once "../views/login-register.php";
    }elseif($uri == '/hospedaje/public/logout/') {
        require_once "../public/resources/php/logout.php";
    }
?>