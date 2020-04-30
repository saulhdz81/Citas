<?php
include "../modelo/DAO/CitaDAO.php";
include "../modelo/DTO/Cita.php";
class ControladorCitas{
    public function ControladoreCitas($cita){

    }

    public function agendarCita($cita){
        $c = new CitaDAO();
        $c->agendarCita($cita);
    }
    public function listarAdministradores(){
        $c = new CitaDAO();
        return $c->listarAdministradores();
    }
    public function listarCitas(){
        $c = new CitaDAO;
        return $c->listarCitas();
    }

    public function listarCitasCVE($cita){
        $c = new CitaDAO();
        return $c->listarCitasCVE($cita);
    }

    public function eliminarCita($cita){
        $c = new CitaDAO();
        return $c->eliminarCita($cita);
    }

    public function actualizarDatosCita($cita){
        $c = new CitaDAO();
        return $c->actualizarDatosCita($cita);
    }

    public function buscarHorario($cita){
        $c = new CitaDAO();
        return $c->buscarHorario($cita);
    }
}
//$CC = new ControladorCitas;

//$CC->listarAdministradores();

?>

