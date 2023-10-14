function mostrarErrorPhp(error){
  $('#mostrarMensaje').html(error);
}
function enviarFormulario(form,funcion){
    var url = form.attr('action');
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(),
           success: function(data)
           {
              funcion(data);
           }
    });
}
function enviarLink(a,funcion){

  $.ajax({
      url: a,
      success: function(data) {
          funcion(data);
      }
  });
}
$(document).ready( function () {

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

  // formulario crear
  $(document).on('submit','#formCrear',function(e){
    e.preventDefault();
    var form = $(this);
    enviarFormulario(form,function(data){
      try{
        r=JSON.parse(data);
        if(r.respuesta){
          $("#formCrear").trigger("reset");
          // $("#crearModal").modal('hide');
          alert('Registro actualizado correctamente');
          window.location.replace("https://www.academiaaiapaec.edu.pe/intranet-aiapaec/");
        }
        else
          alert(r.mensaje);
      }catch(e){
        mostrarErrorPhp(data);
      }
    });
  });
  //formulario editar

    //formulario editar
    $(document).on("submit", "#formEditar", function (e) {
      e.preventDefault();
      var form = $(this);
      enviarFormulario(form, function (data) {
        try {
          r = JSON.parse(data);
          if (r.respuesta) {
            $("#editarModal").modal("hide");
            Swal.fire({
              icon: "success",
              title: "Genial!",
              text: "Actualizado correctamnente!",
            }).then((result) => {
              if (result.value) {
                location.reload();
                $("#formEditar").trigger("reset");
              }
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Oops...Algo salio mal",
              text: r.mensaje,
            });
          }
        } catch (e) {
          mostrarErrorPhp(data);
        }
      });
    });
});
