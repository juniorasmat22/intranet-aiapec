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