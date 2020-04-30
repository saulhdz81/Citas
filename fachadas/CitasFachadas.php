<?php

include "../controlador/ControladorCitas.php";
include "../conexion/conexion.php";


class CitasFachada{

    public function agendarCita($cita){
        $c = new ControladorCitas;
        return $c->agendarCita($cita);
    }
    public function listarAdministradores(){
        $c = new ControladorCitas;
        return $c->listarAdministradores();
    }

    public function listarCitas(){
        $c = new ControladorCitas;
        return $c->listarCitas();
    }

    public function listarCitasCVE($cita){
        $c = new ControladorCitas;
        return $c->listarCitasCVE($cita);
    }

    public function eliminarCita($cita){
        $c = new ControladorCitas();
        return $c->eliminarCita($cita);
    }

    public function actualizarDatosCita($cita){
        $c = new ControladorCitas();
        return $c->actualizarDatosCita($cita);
    }

    public function buscarHorario($cita){
        $c = new ControladorCitas();
        return $c->buscarHorario($cita);
    }
}

$opcion = $_POST["opcion"];

$c = new CitasFachada();

if ($opcion == "listarAdministradores"){
    echo $c->listarAdministradores();
    exit();
}
if ($opcion == "listarCitas"){
    echo $c->listarCitas();
    exit();
}
if($opcion == "agendarCita"){
    $cita = new Cita();
    $cita->setNombreSolicitante($_POST["nombreSolicitante"]);
    $cita->setIdAdministrador($_POST["idAdministrador"]);
    $cita->setDiaCita($_POST["diaCita"]);
    $cita->setHoraInicioCita($_POST["horaInicio"]);
    $cita->setHoraFinCita($_POST["horaFin"]);
    $cita->setAsunto($_POST["asunto"]);
    $cita->setCveEstatus($_POST["cveEstatus"]);
    echo $c->agendarCita($cita);

    exit();
}

if($opcion == "listarCitasCVE"){
    $cita = new Cita();
    $cita->setCveCita($_POST["cveCita"]);
    echo $c->listarCitasCVE($cita);
    exit();
}

if($opcion == "eliminarCita"){
    $cita = new Cita();
    $cita->setCveCita($_POST["cveCita"]);
    echo $c->eliminarCita($cita);
    exit();
}

if($opcion == "actualizarDatosCita"){
    $cita = new Cita();
    $cita->setCveCita($_POST["cveCita"]);
    $cita->setNombreSolicitante($_POST["nombreSolicitante"]);
    $cita->setIdAdministrador($_POST["idAdministrador"]);
    $cita->setDiaCita($_POST["diaCita"]);
    $cita->setHoraInicioCita($_POST["horaInicio"]);
    $cita->setHoraFinCita($_POST["horaFin"]);
    $cita->setAsunto($_POST["asunto"]);
    echo $c->actualizarDatosCita($cita);
    exit();
}

if($opcion == "buscarHorario"){
    $cita = new Cita();
    $cita->setDiaCita($_POST["diaCita"]);
    echo $c->buscarHorario($cita);
    exit();
}
?>