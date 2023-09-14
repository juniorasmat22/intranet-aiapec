 <!-- start page title -->
 <div class="row">
     <div class="col-12">
         <div class="page-title-box">
             <div class="page-title-right">
                 <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="?">Incio</a></li>
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Programas</a></li>
                     <li class="breadcrumb-item active">Escolares</li>
                 </ol>
             </div>
             <h4 class="page-title">Programas Escolares</h4>
         </div>
     </div>
 </div>

 <div class="row">

     <?php
        if ($programas_escolares->respuesta) {
            $filas = $programas_escolares->resultado;
            foreach ($filas as $fila) {


        ?>
             <div class="col-md-6 col-lg-3">
                 <!-- Simple card -->
                 <div class="card d-block">
                     <img class="card-img-top" src="recursos/img/programas/<?php echo $fila->portadaPrograma; ?>" alt="Card image cap">
                     <div class="card-body">
                         <h5 class="card-title"><?php echo $fila->nombreProgramasAcademia; ?></h5>
                         <p class="card-text"><?php echo $fila->descripcionPrograma; ?></p>
                         <a <?php echo "href='?c=matricula&a=registro&programa=$fila->idProgramasAcademia'"?> class="btn btn-guinda">Registrarse</a>
                     </div> <!-- end card-body-->
                 </div> <!-- end card-->
             </div><!-- end col -->
         <?php
            }
        } else {
            ?>
         <div class="alert alert-warning" role="alert">
             <i class="dripicons-warning me-2"></i> No hay <strong>programas escolares</strong> disponibes
         </div>
     <?php
        }
        ?>


 </div>
 <!-- end row -->