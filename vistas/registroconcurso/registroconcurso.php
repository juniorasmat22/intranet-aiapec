<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="?c=seminario">Concurso</a></li>
                    <li class="breadcrumb-item active">Mis Concursos</li>
                </ol>
            </div>
            <h4 class="page-title">Concursos Registrados</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <!-- <div class="col-sm-4">
                        <a href="javascript:void(0);" class="btn btn-guinda mb-2" data-bs-toggle="modal" data-bs-target="#crearModal"><i class="mdi mdi-plus-circle me-2"></i>Registrar</a>
                    </div> -->
                    <!-- <div class="col-sm-8">  
                    </div> -->
                </div>
                <?php require 'tablaregistro.php';?>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<!-- MODAL DE EDICIÓN -->
<div id="editarModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-guinda">
                <h4 class="modal-title" id="editarModalLabel">Editar datos de Concurso</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <?php require 'editar.php'; ?>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    function funcionOpcionEditar(registroConcurso){
      $('#formEditar input[name="idRegistroConcurso"]').val(registroConcurso.idRegistroConcurso);
      $('#formEditar input[name="fechaRegistro"]').val(registroConcurso.fechaRegistro);
      $('#formEditar input[name="montopago"]').val(registroConcurso.montopago);
      $('#formEditar input[name="tipoPago"]').val(registroConcurso.tipoPago);
      $('#formEditar input[name="fechaInicioConcurso"]').val(registroConcurso.fechaInicioConcurso);
      $('#formEditar input[name="operacion"]').val(registroConcurso.operacion);
      $('#formEditar input[name="idConcurso"]').val(registroConcurso.idConcurso);
      $('#formEditar input[name="idEstudiante"]').val(registroConcurso.idEstudiante);
      $('#formEditar input[name="recibo"]').val(registroConcurso.recibo);
      $('#formEditar input[name="estado"]').val(registroConcurso.estado);
    }
  </script>