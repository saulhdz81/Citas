$("#admin").is(function(){
    $.post("fachadas/CitasFachada.php",{opcion:"listarAdministradores"},function(respuesta){
        console.log(respuesta);
        $("#admin").html(respuesta);
    });
});