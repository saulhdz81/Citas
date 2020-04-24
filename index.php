<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Citas</title>
</head>
<body>
    <center>
        <form action="" id="citas">
            <table>
                <tr>
                <td colspan="2" align="center"><h1>Agendar Cita</h1></td>
                </tr>
                <tr>
                    <td>Nombre del solicitante: </td>
                    <td><input type="text" id="nombreSolicitante" required placeholder="Ingrese el nombre del solicitante"></td>
                </tr>
                <tr>
                    <td>Administrador: </td>
                    <td>
                        <select id="admin" name="administrador">
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Dia :</td>
                    <td><input type="date" value="fecha" required></td>
                </tr>
                <tr>
                    <td>Horario Inicio:</td>
                    <td><input type="time" required value="08:00:00"></td>
                </tr>
                <tr>
                    <td>Hora Fin: </td>
                    <td><input type="time" required></td>
                </tr>
                <tr>
                    <td>Asunto :</td>
                    <td><input type="text" required placeholder="Ingrese el asunto de la cita"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Guardar"></td>
                </tr>
            </table>
        </form>
        <div id="saludo"></div>
    </center>
</body>
</html>

<script src="js/jquery-1.11.0.min.js"></script>
<!--<script src="js/scripts.js"></script>-->
<script>
    $(document).ready(function() {
        console.log("Saludos");
        $.post("./fachadas/CitasFachadas.php",{opcion : "listarAdministradores"},function(respuesta){
            console.log(respuesta);
            $("#admin").html(respuesta);
        });
    });
</script>

<?php
//include "./fachadas/CitasFachadas.php";