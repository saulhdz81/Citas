<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Citas</title>
</head>
<body>
    <center>
        <form id="frmcitas">
            <table>
                <tr>
                <td colspan="2" align="center"><h1>Agendar Cita</h1></td>
                </tr>
                <tr>
                    <td>Nombre del solicitante: </td>
                    <td><input type="text" id="nombreSolicitante" name="nombreSolicitante" required placeholder="Ingrese el nombre del solicitante"></td>
                </tr>
                <tr>
                    <td>Administrador: </td>
                    <td>
                        <select id="admin" name="idAdministrador" id="idAdministrador">
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Dia :</td>
                    <td><input type="date" id="diaCita" name="diaCita" required></td>
                </tr>
                <tr>
                    <td>Horario Inicio:</td>
                    <td><input type="time" id="horaInicio"name="horaInicio"required value="08:00:00"></td>
                </tr>
                <tr>
                    <td>Hora Fin: </td>
                    <td><input type="time" name="horaFin" required></td>
                </tr>
                <tr>
                    <td>Asunto :</td>
                    <td><textarea require name="asunto" id="asunto"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="right"><input type="reset" value="Limpiar"><input hidden id="cveEstatus" name="cveEstatus" value="1"><input type="submit" value="Agendar"></td>
                </tr>
            </table>
        </form>
        <br><br>
        <div>
            <center></center>
            <center>
                    <table>
                        <tr>
                            <td><input type="button" value="Listar Citas" id="listarCitas"></td>
                            <td>Ingresa la clave de cita: </td>
                            <td><input type ="text" name="cveCita" id="cveCita" placeholder="Clave Cita"></td>
                            <td><input type ="button" value="Buscar" id="listarCitasCVE"></td>
                        </tr>
                    </table>
            </center>
            <div id="mostrarCitas"></div>
        </div>
        <div id="Result"></div>
        <div id="saludo"></div>
    </center>
</body>
</html>

<script src="js/jquery-1.11.0.min.js"></script>
<!--<script src="js/scripts.js"></script>-->
<script>
    $(document).ready(function() {
        $.post("./fachadas/CitasFachadas.php",{opcion : "listarAdministradores"},function(respuesta){
            console.log(respuesta);
            $("#admin").html(respuesta);
        });
        $("#diaCita").change(function(){
            var dia = document.getElementById("diaCita").value;
            $.post("./fachadas/CitasFachadas.php",{opcion: "buscarHorario", diaCita: dia},function(respuesta){
                $("#horaInicio").val(respuesta);
                //var horaInicio = respuesta;
                //var agregaMinutos = 20;
                //var resultado = respuesta + agregaMinutos;
                console.log(respuesta);
                //$("#horaInicio").attr(respuesta);
                //document.getElementById("horaInicio").innerText = respuesta;
                //
            });
        });
        $("#frmcitas").submit(function(event){
            event.preventDefault();
            $.post("./fachadas/CitasFachadas.php",$("#frmcitas").serialize()+"&opcion=agendarCita",function (respuesta) {
                console.log(respuesta);  
                alert(respuesta);
                //$("#Result").html(respuesta);
            });
        });
        $("#listarCitas").click(function (event) { 
            event.preventDefault();
            $.post("./fachadas/CitasFachadas.php",{opcion : "listarCitas"},function(respuesta){
                console.log(respuesta);
                $("#Result").html(respuesta);
            });
        });
        $("#listarCitasCVE").click(function(){
            var cCita =document.getElementById("cveCita").value;
            $.post("./fachadas/CitasFachadas.php",{opcion: "listarCitasCVE", cveCita: cCita},function(respuesta){
                console.log(respuesta);
                $("#Result").html(respuesta);
            });
        });
       $("a.cita").click(function(){
           console.log($(this).attr("value"));
       });
    });
</script>

<?php
//include "./fachadas/CitasFachadas.php";