<?php
session_start();


$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$sexo = $_POST["sexo"];
$n_pass = $_POST["n_pas"];
$nac = $_POST["nac"];
$pass1 = $_POST["pass_1"];
$pass2 = $_POST["pass_2"];

require '../config/conexion1.php';
require 'funciones-inc.php';


if (emptyInputSignup($nombre, $edad, $sexo, $n_pass, $nac, $pass1, $pass2) !== FALSE) {
    header('location: ../index_register.php?error=emptyinput');
    exit();    
} 
if (pwdMatch($pass1, $pass2) !== FALSE) {
    header('location: ../index_register.php?error=match_pwd');
    exit();
}
if (uidExist($db, $n_pass) == TRUE) {
    header('location: ../index_register.php?error=uidExist');

    exit();
    }

$sql = "INSERT INTO usuarios(nombre, edad, sexo, pasaporte, nacionalidad, contraseña) VALUES ('$nombre', '$edad', '$sexo','$n_pass', '$nac', '$pass1')";
$results = $db->prepare($sql);    
$results->execute();

//userCreate($db, $nombre, $edad, $sexo, $n_pass, $nac, $pass1);

$_SESSION['pasaporte'] = $usuario_login;


header('location: ../main/main_miperfil.php');

?>
