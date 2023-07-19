function mostrar_campos() {
    var codigo_situacion = document.getElementById("situacionEstudiante").value;
  
    if (codigo_situacion=="Egresado de Secundaria") {
        document.getElementById("seccion_academia").style.display = "flex";
        document.getElementById("seccion_colegio").style.display = "none";
        document.getElementById("solo_colegio_aiapaec").style.display = "none";
        
    } else {
        document.getElementById("seccion_colegio").style.display = "flex";
        document.getElementById("seccion_academia").style.display = "none";
        document.getElementById("solo_colegio_aiapaec").style.display = "none";
    }
}
function mostrar_solo_colegio(){
    var codigo_solo_colegio = document.getElementById("colegioEstudiante").value;
    if (codigo_solo_colegio=="AIAPAEC") {
        document.getElementById("solo_colegio_aiapaec").style.display = "flex";
    } else {
        document.getElementById("solo_colegio_aiapaec").style.display = "none";
    }
  
}

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
  

  function llenar_grados() {
    var codigo_area = document.getElementById("idNivel");
    var link = "?c=Grado&a=gradosxnivel";
    var valores = {
        idNivel: codigo_area.value,
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
              respuesta.resultado[i].idGrado +
              "'>" +
              respuesta.resultado[i].descripcionGrado +
              "</option>";
          }
        }
        $("#idGrado").html(c_html);
      } catch (e) {
        
        alert(e);
      }
    });
  }
  