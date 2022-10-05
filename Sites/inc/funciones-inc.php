<?php

function emptyInputSignup($nombre, $edad, $sexo, $n_pass, $nac, $pass1, $pass2) {

    $result;
    if (empty($nombre) || empty($edad) || empty($sexo) || empty($n_pass) || empty($nac) || empty($pass1) || empty($pass2) ){
        
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pass1, $pass2) {

    $result;
    if ($pass1 !== $pass2) {
        $result= true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExist($db, $n_pass) {
    $state = TRUE;
    $sql = 'SELECT * FROM usuarios;';
    $result = $db -> prepare($sql);
    $result -> execute();
    $resultados = $result -> fetchAll();
    
    foreach ($resultados as $r) {
        if ($r[3] == $n_pass){
            $state = FALSE;

            return $state;
            exit(); 
        $state = TRUE;
               
    return TRUE;
        }
    }

}

function userCreate($db, $nombre, $edad, $sexo, $n_pass, $nac, $pass1) {
    
    $sql = "INSERT INTO usuarios(nombre, edad, sexo, pasaporte, nacionalidad, contraseña, id) VALUES ($nombre, $edad, $sexo,$n_pass, $nac, $pass1, '1')";
    $results = $db -> prepare($sql);    
    $results -> execute();
    echo "Tratando de crear el usuario";

    
}

function emptyInputSignup1($nombre, $pass) {

    $result;
    if (empty($nombre) || empty($pass) ){
        
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExist1($db, $usuario_login, $contraseña_login) {
    $state = FALSE;
    $sql = 'SELECT * FROM usuarios;';
    $result = $db -> prepare($sql);
    $result -> execute();
    $resultados = $result -> fetchAll();
    
    foreach ($resultados as $r) {
        if ($r[3] == $usuario_login || $r[5] == $contraseña_login){
            $state = TRUE;

            return $state;
            exit(); 
        $state = FALSE;
               
    return TRUE;
        }
    }

}
