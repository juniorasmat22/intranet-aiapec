$('#buscar').on('click', function() {
    // Obtiene el valor del input (rango de fechas)
    var fechaSeleccionada = $('#singledaterange').val();

    // Divide el rango de fechas en dos partes
    var fechas = fechaSeleccionada.split(' - ');

    // Las dos fechas separadas
    var fechaInicio = fechas[0];
    var fechaFin = fechas[1];

    // Realiza la solicitud AJAX al controlador con las fechas
    $.ajax({
      type: 'POST',
      url: '?c=asistencia&a=index', // Reemplaza con la ruta correcta a tu controlador
      data: {
        fechaInicio: fechaInicio,
        fechaFin: fechaFin
      },
      success: function(response) {
        // Maneja la respuesta del servidor
        //console.log(response);
        
            // Actualiza la página sin recargarla
            window.location.reload();
      },
      error: function(error) {
        console.error('Error en la solicitud AJAX:', error);
      }
    });
  });