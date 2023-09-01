
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Concurso</a></li>
                    <li class="breadcrumb-item active">Todos</li>
                </ol>
            </div>
            <h4 class="page-title">Concurso Disponibles</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
<?php
     if($respuesta->respuesta){
       $filas=$respuesta->resultado->objetos;
      foreach ($filas as $fila) {
         ?>
    <div class="col-md-6 col-xxl-3">
        <!-- project card -->
        <div class="card d-block">
            <!-- project-thumbnail -->
            <img class="card-img-top" src="data:image/jpg;base64,<?php echo base64_encode($fila->portadaConcurso); ?>"  alt="project image cap">
            <div class="card-img-overlay">
                <div class="badge bg-secondary text-light p-1">Ciencias</div>
            </div>

            <div class="card-body position-relative">
                <!-- project title-->
                <h4 class="mt-0">
                    <a <?php echo "href='?c=concurso&a=detalleconcurso&idConcurso=$fila->idConcurso'"; ?> class="text-title"><?php echo  $fila->nombreConcurso; ?></a>
                </h4>

                <!-- project detail-->
                <p class="mb-3">
                    <?php echo  $fila->descripcionConcurso; ?>
                    <BR></BR>
                    <span class="pe-3 text-nowrap">
                        <i class="mdi mdi-calendar-today">Fecha: </i>
                        <b><?php echo date("d/m/Y", strtotime($fila->fechaConcurso));  ?></b>
                        <br>
                        <i class="mdi mdi-code-string">Precio: </i>
                        <b><?php echo "S/." ."00";  ?></b>
                        <br>
                        <i class="mdi mdi-map-marker-outline">Lugar: </i> <br>
                        <b><?php echo  $fila->lugarConcurso; ?></b>
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