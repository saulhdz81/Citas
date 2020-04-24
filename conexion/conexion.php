<?php
include "config.php";

function conectar(){
    $conexion = new mysqli(HOST,USER,PASS,BD);
    if($conexion->connect_errno)
        echo "Error al conectarse a la base". $conexion->connect_error;

    return $conexion;
}

?>