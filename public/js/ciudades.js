$(document).ready(function(){
    $("#depto").change(function(){
        var depto = $(this).val();

        $.get('/admifunciones/buscarciudades/' + depto, function(data){
            console.log(data);
            var listaciudades = '<option value="">Seleccione la ciudad</option>';
            for (var i = 0; i < data.length; i++) {
                listaciudades += '<option value="' + data[i].idciudad + '">' + data[i].nombre + '</option>';
            }
            $("#ciudad").html(listaciudades);
        });
    });
});
