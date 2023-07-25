<?php

namespace controladores;

if (!$respuesta->respuesta) {
?>
    <script type="text/javascript">
        alert('error al obtener el detalle del seminario')
    </script>
<?php
} else {

    $fila_seminario = $respuesta->resultado;

    $curso_seminario = new CursoseminarioControlador();
    $curso_seminario->entidad->idSeminario = $fila_seminario->idSeminario;
    $lista_curso_seminario = $curso_seminario->modelo->get_cursos_por_seminario($curso_seminario->entidad);
}
?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="?c=seminario">Seminario</a></li>
                    <li class="breadcrumb-item active">Detalle</li>
                </ol>
            </div>
            <h4 class="page-title">Detalle - <?php echo $fila_seminario->nombreSeminario ?></h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xxl-8 col-lg-6">
        <!-- project card -->
        <div class="card d-block">
            <div class="card-body">

                <!-- project title-->
                <h3 class="mt-0">
                    <?php echo $fila_seminario->nombreSeminario ?>
                </h3>
                <div class="badge bg-secondary text-light mb-3">Ciencias</div>

                <h5>Resumen:</h5>

                <p class="text-muted mb-2">

                    <?php echo $fila_seminario->descripcionSeminario ?>
                </p>

                <p class="text-muted mb-4">
                    <?php echo $fila_seminario->resumenSeminario ?>
                </p>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-4">
                            <h5>Fecha</h5>
                            <p><?php echo date("d/m/Y", strtotime($fila_seminario->fechaSeminario));  ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <h5>Hora de Incio</h5>
                            <p><?php echo date("h:i A", strtotime($fila_seminario->horaInicioSeminario));  ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <h5>Hora de Fin</h5>
                            <p><?php echo date("h:i A", strtotime($fila_seminario->horaFinSeminario));  ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <h5>Precio</h5>
                            <p><?php echo "S/.  " . number_format($fila_seminario->precioSeminario, 2);  ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <h5>Lugar</h5>
                            <p>Jr. Torre Tagle #178 - Urb. San Andrés</p>
                        </div>
                    </div>
                </div>

                <div id="tooltip-container">
                    <h5>Docentes:</h5>
                    <?php
                    if ($lista_curso_seminario->respuesta) {
                        $filas_seminario_curso = $lista_curso_seminario->resultado;
                        foreach ($filas_seminario_curso as $fila) {
                    ?>
                            <a href="javascript:void(0);" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $fila->docenteCursoSeminario; ?>" class="d-inline-block">
                                <img src="recursos/assets/images/users/avatar-6.jpg" class="rounded-circle img-thumbnail avatar-xl" alt="friend">
                            </a>
                        <?php
                        }
                    } else {
                        ?>
                        <script type="text/javascript">
                            alert('error al obtener los docentes')
                        </script>
                    <?php
                    }
                    ?>
                </div>

            </div> <!-- end card-body-->

        </div> <!-- end card-->

        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 mb-3">Temario por curso</h4>
                <div class="accordion custom-accordion" id="custom-accordion-one">
                    <?php
                    if ($lista_curso_seminario->respuesta) {
                        $filas_seminario_curso = $lista_curso_seminario->resultado;
                        foreach ($filas_seminario_curso as $fila) {

                            $curso = new CursoControlador();
                            $curso->entidad->idCurso = $fila->idCurso;
                            $mi_curso = $curso->modelo->get($curso->entidad);
                    ?>
                            <div class="card mb-0">
                                <div class="card-header" id="headingFour">
                                    <h5 class="m-0">
                                        <a class="custom-accordion-title d-block py-1" data-bs-toggle="collapse" href="#collapse<?php echo $fila->idCursoSeminario; ?>" aria-expanded="true" aria-controls="collapse<?php echo $fila->idCursoSeminario; ?> ">
                                            <?php echo $mi_curso->resultado->nombreCurso; ?> <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapse<?php echo $fila->idCursoSeminario; ?>" class="collapse" aria-labelledby="headingFour" data-bs-parent="#custom-accordion-one">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start mt-2">
                                            <img class="me-3 avatar-xl rounded" src="recursos/assets/images/users/avatar-3.jpg" alt="Generic placeholder image">
                                            <div class="w-100 overflow-hidden">
                                                <h5 class="mt-0"><?php echo $fila->docenteCursoSeminario; ?></h5>
                                                Docente encargado del curso.
                                                <br>
                                                Horario: <br>

                                                <?php echo date("h:i a", strtotime($fila->horaInicioCursoSeminario));   ?>
                                                -
                                                <?php echo date("h:i a", strtotime($fila->horaFinCursoSeminario));  ?>
                                                <?php
                                                $temaCurso = new TemaseminarioControlador();
                                                $temaCurso->entidad->idCursoSeminario = $fila->idCursoSeminario;
                                                $mis_temas_curso = $temaCurso->modelo->get_temas_por_curso($temaCurso->entidad);
                                                ?>
                                                <ol class="list-group list-group-numbered">
                                                    <?php
                                                    if ($mis_temas_curso->respuesta) {
                                                        $temas_seminario_curso = $mis_temas_curso->resultado;
                                                        foreach ($temas_seminario_curso as $fila) {
                                                    ?>
                                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                                <div class="ms-2 me-auto">
                                                                    <div class="fw-bold"><?php echo $fila->nombreTemaSeminario; ?> </div>
                                                                    <!-- Cras justo odio -->
                                                                </div>
                                                                <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                                                            </li>

                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <script type="text/javascript">
                                                            alert('error al obtener los temas por curso')
                                                        </script>
                                                    <?php
                                                    }
                                                    ?>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                    } else {
                        ?>
                        <script type="text/javascript">
                            alert('error al obtener los docentes')
                        </script>
                    <?php
                    }
                    ?>
                </div>


            </div> <!-- end card-body-->
        </div>
        <!-- end card-->
    </div> <!-- end col -->

    <div class="col-lg-6 col-xxl-4">
        <div class="card">
            <div class="card-body">
                <!-- <h5 class="card-title mb-3">Progress</h5> -->
                <button type="button" class="btn btn-guinda " data-bs-toggle="modal" data-bs-target="#registro-seminario-modal">Registrate</button>
                <br>
                <br>

                <img src="recursos/img/simulacro/portadas/imagen_simulacro.jpeg" alt="post-img" class="rounded me-1 mb-3 mb-sm-0 img-fluid">
                <!-- <br><br>
                 <div class="col">
                        <img src="recursos/assets/images/small/small-2.jpg" alt="post-img" class="rounded me-1 img-fluid mb-3">
                        <img src="recursos/assets/images/small/small-3.jpg" alt="post-img" class="rounded me-1 img-fluid">
                    </div>
                 -->
            </div>
        </div>
        <!-- end card-->
    </div>
</div>
<!-- end row -->


<!-- Info Header Modal -->

<div id="registro-seminario-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registro-seminario-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="registro-seminario-modalLabel">Formulario de registro - <?php echo $fila_seminario->nombreSeminario; ?> </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="?c=Matriculaseminario&a=matricula" method="post" id="formCrearMatricula" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $fila_seminario->idSeminario; ?>" name="idSeminario">
                    <input type="hidden" value="<?php echo $_SESSION['idEstudiante'] ?>" name="idEstudiante">
                    <div class="position-relative mb-3">
                        <label class="form-label" for="validationTooltip01">Monto Cancelado</label>
                        <input type="number" step="any" class="form-control" name="montoPagoSeminario" placeholder="Monto Pagado" required>
                        <div class="valid-tooltip">
                            Genial!
                        </div>
                        <div class="invalid-tooltip">
                            Ingrese un monto válido.
                        </div>
                    </div>
                    <div>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="example-select" class="form-label">Tipo de Pago</label>
                        <select class="form-select" id="tipoPagoSeminario" name="tipoPagoSeminario">
                            <option>Tranferencia B.C.P</option>
                            <option>Yape</option>
                            <option>Tranferencia Interbancaria</option>
                            <option>Efectivo</option>

                        </select>
                        <div class="valid-tooltip">
                            Genial
                        </div>
                        <div class="invalid-tooltip">
                            Porfavor selecione un tipo de pago.
                        </div>
                    </div>
                    <div class="position-relative mb-3">
                        <label class="form-label" for="operacion">Nro de Operación</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="operacion" placeholder="Nro de Operación" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="invalid-tooltip">
                                Por favor ingresa un numero válido.
                            </div>
                        </div>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="recibo" class="form-label">Recibo</label>
                        <input type="file"   id="recibo" name="recibo"class="form-control" required accept="image/*">
                        <div class="invalid-tooltip">
                           Por favor seleccion un recibo.
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </div>
                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->