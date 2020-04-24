<?php
require_once "../modelo/DAO/CitaDAO.php";
class ControladorCitas{
    public function ControladoreCitas(){

    }
    public function listarAdministradores(){
        $c = new CitaDAO;
        return $c->listarAdministradores();
    }
}
$CC = new ControladorCitas;

$CC->listarAdministradores();

?>

