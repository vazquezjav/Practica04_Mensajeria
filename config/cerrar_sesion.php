<?php
    session_start();
    $_SESSION['isLogged']=FALSE;
    session_destroy();
    header("Location: /Practica04_Mensajeria/public/vista/login.html");

?>