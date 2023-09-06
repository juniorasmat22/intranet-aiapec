function mostrarErrorPhp(error) {
    $("#mostrarMensaje").html(error);
  }
  function enviarFormulario(form, funcion) {
    var url = form.attr("action");
  
    var data = new FormData();
  
    //Form data
    var form_data = $("#formEditar").serializeArray();
    $.each(form_data, function (key, input) {
      data.append(input.name, input.value);
    });
  
    //File data
    var file_data = $('input[name="recibo"]')[0].files;
    for (var i = 0; i < file_data.length; i++) {
      data.append("recibos", file_data[i]);
    }
  
    //Custom data
    data.append("recibo", $('input[name="recibo"]')[0].files[0].name);
  
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
      //opcion editar
  $(document).on("click", ".editar", function (e) {
    e.preventDefault();
    enviarLink($(this).attr("href"), function (data) {
      try {
        respuesta = JSON.parse(data);
        if (respuesta.respuesta) {
          $("#editarModal").modal("show");
          funcionOpcionEditar(respuesta.resultado);
        } else {
          alert(respuesta.mensaje);
        }
      } catch (e) {
        mostrarErrorPhp(data);
        alert(e);
      }
    });
  });
    //formulario editar
    $(document).on("submit", "#formEditar", function (e) {
      e.preventDefault();
      var form = $(this);
      enviarFormulario(form, function (data) {
        try {
          r = JSON.parse(data);
          if (r.respuesta) {
            $("#formEditar").trigger("reset");
            $("#editarModal").modal("hide");
            alert("registro Editado");
            location.reload();
          } else alert(r.mensaje);
        } catch (e) {
          mostrarErrorPhp(data);
        }
      });
    });
  });
  