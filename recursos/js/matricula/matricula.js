function enviarLink(a, valor, funcion) {
    $.ajax({
      url: a,
      type: "POST",
      data: valor,
      success: function (data) {
        funcion(data);
      },
    });
  }
  
  function llenar_nivel_sede() {
    var codigo_programa = document.getElementById("idProgramaAcademia");
    var link = "?c=Programanivel&a=nivelesPorPrograma";
    var valores = {
      idProgramasAcademia: codigo_programa.value,
    };
  
    //llenamos combo de grados
    enviarLink(link, valores, function (data) {
      try {
        respuesta = JSON.parse(data);
        c_html = "";
        if (respuesta.respuesta) {
          var c_html = "";
          for (var i = 0; i < respuesta.resultado.length; i++) {
            c_html +=
              "<option value='" +
              respuesta.resultado[i].nombreNivel +
              "'>" +
              respuesta.resultado[i].nombreNivel +
              "</option>";
          }
        }
        $("#programaNivel").html(c_html);
      } catch (e) {
        
        alert(e);
      }
    });
  }
  