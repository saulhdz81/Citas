<?php
class Cita{
    private $cveCita;
    private $nombreSolicitante;
    private $diaCita;
    private $horaInicioCita;
    private $horaFinCita;
    private $asunto;
    private $idAdministrador;
    private $cveEstatus;

    //SETTERS
    function setCveCita($cveCita){
        $this->cveCita = $cveCita;
    }

    function setNombreSolicitante($nombreSolicitante){
        $this->nombreSolicitante = $nombreSolicitante;
    }

    function setDiaCita($diaCita){
        $this->diaCita = $diaCita;
    }

    function setHoraInicioCita($horaInicioCita){
        $this->horaInicioCita = $horaInicioCita;
    }

    function setHoraFinCita($horaFinCita){
        $this->horaFinCita = $horaFinCita;
    }

    function setAsunto($asunto){
        $this->asunto = $asunto;
    }

    function setIdAdministrador($idAdministrador){
        $this->idAdministrador = $idAdministrador;
    }

    function setCveEstatus($cveEstatus){
        $this->cveEstatus = $cveEstatus;
    }
    //GETTERS

    function getCveCita(){
        return $this->cveCita;
    }

    function getNombreSolicitante(){
        return $this->nombreSolicitante;
    }

    function getDiaCita(){
        return $this->diaCita;
    }

    function getHoraInicioCita(){
        return $this->horaInicioCita;
    }

    function getHoraFinCita(){
        return $this->horaFinCita;
    }

    function getAsunto(){
        return $this->asunto;
    }

    function getIdAdministrador(){
        return $this->idAdministrador;
    }

    function getCveEstatus(){
        return $this->cveEstatus;
    }
}
?>