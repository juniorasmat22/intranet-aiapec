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
  $(document).on('click','.editar',function(e){
    e.preventDefault();
    enviarLink($(this).attr('href'),function(data){
      try{
        respuesta=JSON.parse(data);
        if(respuesta.respuesta){
          $("#editarModal").modal('show');
          funcionOpcionEditar(respuesta.resultado);
        }else{
          alert(respuesta.mensaje);
        }

      }catch(e){
        mostrarErrorPhp(data);
        alert(e);
      }
    });
  });

  //opcion eliminar
  $(document).on('click','.eliminar',function(e){
    e.preventDefault();
    respuesta=confirm('confirmar ');
    if(respuesta){
      enviarLink($(this).attr('href'),function(data){
        try{
          respuesta=JSON.parse(data);
          if(respuesta.respuesta){
            location.reload();
          }else{
            alert(respuesta.mensaje);
          }
        }catch(e){
          mostrarErrorPhp(data);
        }
      });
    }

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
          $("#crearModal").modal('hide');
          alert('Nuevo registro creado');
          location.reload();
        }
        else
          alert(r.mensaje);
      }catch(e){
        mostrarErrorPhp(data);
      }
    });
  });
  //formulario editar
    $(document).on('submit','#formEditar',function(e){
      e.preventDefault();
      var form = $(this);
      enviarFormulario(form,function(data){
        try{
          r=JSON.parse(data);
          if(r.respuesta){
            $("#formEditar").trigger("reset");
            $("#editarModal").modal('hide');
            alert('registro Editado');
            location.reload();
          }
          else
            alert(r.mensaje);
        }catch(e){
          mostrarErrorPhp(data);
        }
      });
    });
});
