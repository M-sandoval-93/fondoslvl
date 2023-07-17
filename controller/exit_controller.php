<?php 
    require_once '../model/session_model.php';

    $close_Session = new Session();
    $close_Session->closeSession();

    header("location: ../");

?>