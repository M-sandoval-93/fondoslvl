<?php

    require_once '../model/session_model.php';

    $sessionStart = new Session(); // session variable initialization (inicialización de la variable sesión)
    $data = $_POST['dataLogin']; // reception of the action to be carried out (recepción de la acción a realizar)

    switch($data) {
        case "login":
            $userAccount = json_decode(json_encode($_POST['userAccount'])); // converting js object to php object
            print $sessionStart->checkUserAccount($userAccount);
            break;

        case "newPassword":
            $password = json_decode(json_encode($_POST['newPassword'])); // converting js object to php object
            print $sessionStart->newPassword($password);
            break;
    }

?>