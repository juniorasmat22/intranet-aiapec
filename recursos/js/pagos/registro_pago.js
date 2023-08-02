function mostrarErrorPhp(error) {
  $("#mostrarMensaje").html(error);
}
function enviarFormulario(form, funcion) {
  var url = form.attr("action");

  var data = new FormData();

  //Form data
  var form_data = $("#formCrearPago").serializeArray();
  $.each(form_data, function (key, input) {
    data.append(input.name, input.value);
  });

  //File data
  var file_data = $('input[name="reciboPago"]')[0].files;
  for (var i = 0; i < file_data.length; i++) {
    data.append("recibos", file_data[i]);
  }

  //Custom data
  data.append("reciboPago", $('input[name="reciboPago"]')[0].files[0].name);

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
function enviarLink(a, funcion) {
  $.ajax({
    url: a,
    success: function (data) {
      funcion(data);
    },
  });
}
$(document).ready(function () {
  // formulario crear
  $(document).on("submit", "#formCrearPago", function (e) {
    e.preventDefault();
    var form = $(this);
    enviarFormulario(form, function (data) {
      try {
        r = JSON.parse(data);
        console.log(r);
        if (r.respuesta) {
          $("#formCrearPago").trigger("reset");
          $("#primary-header-modal").modal("hide");
          alert("Pago registrado correctamente");
          location.reload();
        } else alert(r.mensaje);
      } catch (e) {
        mostrarErrorPhp(data);
      }
    });
  });

});
