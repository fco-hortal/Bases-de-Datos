<?php

session_start();
$usuario_login = $_POST['user'];
$contraseña_login = $_POST['pass'];


require "../config/conexion1.php";
require 'funciones-inc.php';
    
if (emptyInputSignup1($usuario_login, $contraseña_login) !== FALSE) {
    header('location: ../index.php?error=emptyinput');
    exit();
}
    
if (uidExist1($db, $usuario_login, $contraseña_login) == FALSE) {
    header('location: ../index.php?error=badCred');
    exit();
}
if (uidExist1($db, $usuario_login, $contraseña_login) == TRUE) {
    
    $_SESSION['pasaporte'] = $usuario_login;
    
    header('location: ../main/main_miperfil.php');
}
    

?>