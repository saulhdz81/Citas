<?php

include "../controlador/ControladorCitas.php";

class CitasFachada{
    public function listarAdministradores(){
        $c = new ControladorCitas();
        return $c->listarAdministradores();
    }
}

$opcion = $_POST["opcion"];
echo $opcion;

$opcion = "listarAdministradores";
$c = new CitasFachada();
if ($opcion == "listarAdministradores"){
    echo $c->listarAdministradores();
}

?>