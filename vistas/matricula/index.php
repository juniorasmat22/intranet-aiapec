 <!-- start page title -->
 <div class="row">
   <div class="col-12">
     <div class="page-title-box">
       <div class="page-title-right">
         <ol class="breadcrumb m-0">
           <li class="breadcrumb-item"><a href="?">Incio</a></li>
           <li class="breadcrumb-item"><a href="javascript: void(0);">Matrícula</a></li>
           <li class="breadcrumb-item active">Mis Matrículas</li>
         </ol>
       </div>
       <h4 class="page-title">Registro de Matrículas</h4>
     </div>
   </div>
 </div>

 
 <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a href="?c=matricula&a=registro" class="btn btn-guinda mb-2" ><i class="mdi mdi-plus-circle me-2"></i> Nueva Matricula</a>
                    </div>
                </div>
                <?php require 'tabla.php'; ?>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->