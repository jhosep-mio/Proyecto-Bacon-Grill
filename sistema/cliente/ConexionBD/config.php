<?php

    define("TOKEN_MP", "TEST-8425550620283048-111712-129681faaedd097bc8da06a92d67b6d7-1241291461");

    define("KEY_TOKEN", "ABC.qwer-159");
    
    define("MONEDA","S/ ");

    if(!isset($_SESSION['datos_login'])){
        session_start();
    }
    if(isset($_SESSION['datos_login'])){
      $arregloUsuario=$_SESSION['datos_login'];
    }
    
    $num_cart=0;

    if(isset($_SESSION['carrito']['productos'])){
        $num_cart= count($_SESSION['carrito']['productos']);
    }
?>