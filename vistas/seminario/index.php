<?php

namespace controladores;

$seminarios = new SeminarioControlador();
$lista_seminarios = $seminarios->modelo->listar();
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Seminarios</a></li>
                    <li class="breadcrumb-item active">Todos</li>
                </ol>
            </div>
            <h4 class="page-title">Seminarios Disponibles</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
<?php
     if($lista_seminarios->respuesta){
       $filas=$lista_seminarios->resultado->objetos;
      foreach ($filas as $fila) {
         ?>
    <div class="col-md-6 col-xxl-3">
        <!-- project card -->
        <div class="card d-block">
            <!-- project-thumbnail -->
            <img class="card-img-top" src="recursos/assets/images/projects/project-1.jpg" alt="project image cap">
            <div class="card-img-overlay">
                <div class="badge bg-secondary text-light p-1">Ciencias</div>
            </div>

            <div class="card-body position-relative">
                <!-- project title-->
                <h4 class="mt-0">
                    <a <?php echo "href='?c=seminario&a=detalleseminario&idSeminario=$fila->idSeminario'"; ?> class="text-title"><?php echo  $fila->nombreSeminario; ?></a>
                </h4>

                <!-- project detail-->
                <p class="mb-3">
                    <?php echo  $fila->descripcionSeminario; ?>
                    <BR></BR>
                    <span class="pe-3 text-nowrap">
                        <i class="mdi mdi-calendar-today">Fecha: </i>
                        <b><?php echo date("d/m/Y", strtotime($fila->fechaSeminario));  ?></b>
                        <br>
                        <i class="mdi mdi-code-string">Precio: </i>
                        <b><?php echo "S/." .$fila->precioSeminario;  ?></b>
                        <br>
                        <i class="mdi mdi-map-marker-outline">Lugar: </i>
                        <b>Jr. Torre Tagle #178</b>
                    </span>
                   
                </p>
               
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
    <?php
        }
      }else{
        ?>
        <script type="text/javascript">alert('error al obtener los seminarios')</script>
        <?php
      }
      ?>
    
</div>
<!-- end row-->