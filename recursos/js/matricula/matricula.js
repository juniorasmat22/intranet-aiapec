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
    programaNivel.selectedIndex = 0;
    programaSede.selectedIndex = 0;
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
          
          document.getElementById("programaNivel").required= true;
          document.getElementById("niveles_programa").style.display = "";
          var c_html = "<option selected disabled value=''>Seleccione una opción</option>";
          for (var i = 0; i < respuesta.resultado.length; i++) {
            c_html +=
              "<option value='" +
              respuesta.resultado[i].idNivelp +
              "'>" +
              respuesta.resultado[i].nombreNivel +
              "</option>";
          }
          $("#programaNivel").html(c_html);
        }else{
          document.getElementById("programaNivel").required= false;
          document.getElementById("niveles_programa").style.display = "none";
        }
       
      } catch (e) {
        
        alert(e);
      }
    });

    //enviar link para sedes
    var link = "?c=Programasede&a=sedesPorPrograma";


    //llenamos combo sedes
    enviarLink(link, valores, function (data) {
      try {
        respuesta = JSON.parse(data);
        c_html = "";
        if (respuesta.respuesta) {
          
          document.getElementById("programaSede").required= true;;
          document.getElementById("sedes_programa").style.display = "";
          var c_html = "<option selected disabled value=''>Seleccione una opción</option>";
          for (var i = 0; i < respuesta.resultado.length; i++) {
            c_html +=
              "<option value='" +
              respuesta.resultado[i].idSede +
              "'>" +
              respuesta.resultado[i].nombreSede +
              "</option>";
          }
          $("#programaSede").html(c_html);
        }else{
          document.getElementById("programaSede").required= false;
          document.getElementById("sedes_programa").style.display = "none";
          
        }
       
      } catch (e) {
        
        alert(e);
      }
    });
  }
  