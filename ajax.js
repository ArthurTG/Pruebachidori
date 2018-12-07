// texto de un boton
var texto_boton = '<button type="button" class="btn btn-success"><i class="fas fa-user"></i> {n}</button>';

// repetir la funcion constantemente
setInterval(revisar_conectados, 3000);

// ejecutar la funcion al principio
revisar_conectados();

// hacer llamada ajax
function revisar_conectados() {
    $.ajax("ok.php")
            .done(function (respuesta) {
                var r = JSON.parse(respuesta);
                $("#conectados").html("");
                if (r.exito === true) {
                    for (var i = 0; i < r.datos.length; i++) {
                        $("#conectados").append(texto_boton.replace('{n}',
                                r.datos[i].nombre));
                    }
                } else {
                    $("#conectados").text(r.mensaje);
                }
            });
}
