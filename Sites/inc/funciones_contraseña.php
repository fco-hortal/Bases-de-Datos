<?php

function passExist($pass_act, $pasaporte, $db) {
    $state = TRUE;
    $sql = 'SELECT pasaporte, contraseña FROM usuarios WHERE usuarios.pasaporte = $pasaporte;';
    $result = $db -> prepare($sql);
    $result -> execute();
    $resultados = $result -> fetchAll();

    foreach ($resultados as $r) {
        if ($r[0] == $pasaporte || $r[1]) {
            return FALSE;
            exit();
        }
    }
    return TRUE;
}





?>