function enviarLink2(a, valor, funcion) {
    $.ajax({
      url: a,
      type: "POST",
      data: valor,
      success: function (data) {
        funcion(data);
      },
    });
  }
  
  function llenar_carreras() {
    var codigo_area = document.getElementById("idArea");
    var link = "?c=Carrera&a=carrerasxarea";
    var valores = {
      idArea: codigo_area.value,
    };
  
    //llenamos combo de grados
    enviarLink2(link, valores, function (data) {
      try {
        respuesta = JSON.parse(data);
        c_html = "";
        if (respuesta.respuesta) {
          var c_html = "";
          for (var i = 0; i < respuesta.resultado.length; i++) {
            c_html +=
              "<option value='" +
              respuesta.resultado[i].idCarrera +
              "'>" +
              respuesta.resultado[i].nombreCarrera +
              "</option>";
          }
        }
        $("#idCarrera").html(c_html);
      } catch (e) {
        
        alert(e);
      }
    });
  }
  