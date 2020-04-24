<?php
include "../../conexion/conexion.php";
include "../DTO/Cita.php";

class CitaDAO{
    public function CitaDAO(){

    }


    public function agendarCita($cita){
        $conexion = conectar();
        $nombreSolicitante = $cita->getNombreSolicitante();
        $diaCita = $cita->getDiaCita();
        $horaInicioCita = $cita->getHoraInicioCita();
        $horaFinCita = $cita->getHoraFinCita();
        $asunto = $cita->getAsunto();
        $idAdministrador = $cita->getIdAdministrador();
        $cveEstatus = $cita->getCveEstatus();
        $Query = "INSERT INTO citas VALUES ('$nombreSolicitante','$diaCita','$horaInicioCita','$horaFinCita')";
        $Query += "'$asunto','$idAdministrador','$cveEstatus'";
        if (!$conexion->query($Query))
            echo "Error al Insertar";
        else
            echo "El registro se ha guardado correctamente";
    }


    public function listarAdministradores(){
        $conexion = conectar();
        $Query = "SELECT * FROM administrador";
        foreach($conexion->query($Query) as $row){
            //print_r($row);
            echo "<option value = ".$row['idaministrador'].">".$row['nombre']."</option>";
        }
    }

    
}

//$CD = new CitaDAO;
//$CD->listarAdministradores();
?>