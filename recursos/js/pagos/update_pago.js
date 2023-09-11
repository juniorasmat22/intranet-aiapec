function enviarFormulario_update(form, funcion) {
    var url = form.attr("action");
  
    var data = new FormData();
  
    //Form data
    var form_data = $("#formActualizarRecibo").serializeArray();
    $.each(form_data, function (key, input) {
      data.append(input.name, input.value);
    });
  
    //File data
    var file_data = $('input[name="reciboPago"]')[0].files;
    for (var i = 0; i < file_data.length; i++) {
      data.append("reciboPago", file_data[i]);
    }
  
    //Custom data
    //data.append("recibosPago", $('input[name="reciboPago"]')[0].files[0].name);
  
    $.ajax({
      type: "POST",
      url: url,
      processData: false,
      contentType: false,
      data: data,
      success: function (data) {
        funcion(data);
      },
    });
  }


  $(document).ready(function () {
    // formulario crear
    $(document).on("submit", "#formActualizarRecibo", function (e) {
      e.preventDefault();
      var form = $(this);
      enviarFormulario_update(form, function (data) {
        try {
          r = JSON.parse(data);
          if (r.respuesta) {
            $("#formActualizarRecibo").trigger("reset");
            alert("recibo actualizado correctamente");
            location.reload();
          } else alert(r.mensaje);
        } catch (e) {
          mostrarErrorPhp(data);
        }
      });
    });
  
  });
  