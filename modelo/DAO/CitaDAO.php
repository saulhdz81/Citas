<?php
include "./../../conexion/conexion.php";
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
        $Query = "INSERT INTO citas VALUES (NULL,'$nombreSolicitante','$idAdministrador','$diaCita','$horaInicioCita','$horaFinCita','$asunto','$cveEstatus')";
        if (!$conexion->query($Query))
            echo "Error al Insertar  </br>".$Query;
        else
            echo "El registro se ha guardado correctamente";

    }

    public function verDisponible($cita){
        $conexion = conectar();
        $diaCita = $cita->getDiaCita();
        $horaInicioCita = $cita->getHoraInicioCita();
        $idAdministrador = $cita->getIdAdministrador();
        $Query = "SELECT horainicio FROM citas WHERE dia = '$diaCita' and horainicio = '$horaInicioCita' and idadministrador = '$idAdministrador' and cveestatus = '0'";
        $resultado = count($conexion->query($Query));
        if($resultado > 1)
            return 1;
    }

    public function buscarHorario($cita){
        $conexion = conectar();
        $diaCita = $cita->getDiaCita();
        $Query = "SELECT horafin FROM citas WHERE dia = '$diaCita' ORDER BY dia DESC LIMIT 1;";
        $result = $conexion->query($Query);
        if($result->num_rows == 0){
            echo "08:00:00";
        }else{
            foreach($result as $row){
                echo $row['horafin'];
            }
        }
    }

    public function listarCitas(){
        $conexion = conectar();
        $Query = "SELECT * FROM citas WHERE cveestatus = 1";
        $result= $conexion->query($Query);
        $count = $result->num_rows;
        if($count > 0 ){
            echo "<table>";
            echo "<tr><td>Administrador</td><td>Nombre</td><td>Dia</td><td>Hora Inicio</td><td>Hora Fin</td><td>Asunto</td></tr>";
            foreach($result as $row){
                echo "<tr><td>".$row['idadministrador']."</td>";
                echo "<td>".$row['nombre']."</td>";
                echo "<td>".$row['dia']."</td>";
                echo "<td>".$row['horainicio']."</td>";
                echo "<td>".$row['horafin']."</td>";
                echo "<td>".$row['asunto']."</td></tr>";
            }
            echo "</table>";
            
        }
    }

    public function listarCitasCVE($cita){
        $conexion = conectar();
        $cveCita = $cita->getCveCita();
        $Query = "SELECT * FROM citas  WHERE nombre like '%$cveCita%' OR asunto LIKE '%$cveCita%' OR dia LIKE '%$cveCita%' OR horainicio LIKE '%$cveCita%' OR horafin LIKE '%$cveCita%' AND cveestatus = 1;";
        if (!$result = $conexion->query($Query)){
            echo "Error en la consulta ". $conexion->error;
            exit();
        }
        $count = $result->num_rows;
        if($count > 0 ){
            echo "<table>";
            echo "<tr><td>Administrador</td><td>Nombre</td><td>Dia</td><td>Hora Inicio</td><td>Hora Fin</td><td>Asunto</td><td>Cancelar Cita</td></tr>";
            foreach($result as $row){
                echo "<tr><td>".$row['idadministrador']."</td>";
                echo "<td>".$row['nombre']."</td>";
                echo "<td>".$row['dia']."</td>";
                echo "<td>".$row['horainicio']."</td>";
                echo "<td>".$row['horafin']."</td>";
                echo "<td>".$row['asunto']."</td>";
                echo "<td><a href='#' class='cita' value='".$row['idcita']."'>Eliminar</a></td></tr>";
            }
            echo "</table>"; 
        }else
            echo "No existen registros con esas claves";

    }

    public function actualizarDatosCita($cita){
        $conexion = conectar();
        $cveCita = $cita->getCveCita();
        $nombreSolicitante = $cita->getNombreSolicitante();
        $diaCita = $cita->getDiaCita();
        $horaInicioCita = $cita->getHoraInicioCita();
        $horaFinCita = $cita->getHoraFinCita();
        $asunto = $cita->getAsunto();
        $idAdministrador = $cita->getIdAdministrador();
        $Query = "UPDATE citas SET idadministrador = '$idAdministrador',nombre ='$nombreSolicitante', dia = '$diaCita',horainicio = '$horaInicioCita',horafin = '$horaFinCita',asunto = '$asunto' WHERE idcita = '$cveCita';";
        if(!$conexion->query($Query)){
            echo "Existio un error al actualizar los datos. ".$conexion->error;
        }else{
            echo "Los datos de han actualizado";
        }
    }

    public function eliminarCita($cita){
        $conexion = conectar();
        $cveCita = $cita->getCveCita();
        $Query = "UPDATE citas SET cvestatus=0 WHERE idcita = $cveCita";
        if(!$conexion->query($Query)){
            echo "Error en la consulta ".$conexion->error;
        }else{
            echo "Se ha eliminado la cita";
        }

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