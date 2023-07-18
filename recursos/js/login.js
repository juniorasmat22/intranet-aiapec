$(document).on('submit','#formLogin',function(e){
   e.preventDefault();
   let form = $(this);
   enviarFormulario(form,function(data){
      try{
         respuesta = JSON.parse(data);
         if(respuesta.respuesta){
            window.location.reload();
         }else{
            alert(respuesta.mensaje);
         }
      }catch(e){
         alert(data);
      }
   });
});

function enviarFormulario(form,funcion){
   let url = form.attr('action');
   let method = form.attr('method');
   $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data){
         funcion(data);
      }
   });
}
