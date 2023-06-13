<?php

    if ($_GET['ruta'] == 'login' ||
        $_GET['ruta'] == 'home') {
        require_once "view/" . $_GET['ruta'] . ".php";
    } else {
        require_once "view/404.php";
    }


?>