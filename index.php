<?php

    require_once "./setting/version.php";


    // time zon e setting (seteo de la zona horaria)
    date_default_timezone_set('America/Santiago');



    // COMIENZO DE LAS SESIONES
    session_start();
    $_SESSION['version'] = VERSION;



    // COMPROVACIÓN DE SESIÓN Y CONTROL DE VISTAS
    if (isset($_SESSION['usser']['name'])) {
        if (isset($_GET['rut'])) {
            require_once "./controller/ruta_controller.php";
        } else {
            header("location: home");
        }
    } else {
        require_once "./view/login.php";
    }


?>