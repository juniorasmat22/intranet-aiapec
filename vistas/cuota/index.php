<?php

namespace controladores;

$matricula = new MatriculaControlador();
$matricula->entidad->idEstudiante = $_SESSION['idEstudiante'];
$mis_matriculas = $matricula->modelo->get_matriculas_por_estudiante($matricula->entidad);
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pagos</a></li>
                    <li class="breadcrumb-item active">Mis Pago</li>
                </ol>
            </div>
            <h4 class="page-title">Mis Pagos</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <?php


    if ($mis_matriculas->respuesta) {
        $filas = $mis_matriculas->resultado;
        foreach ($filas as $fila) {
            $programa_academia = new ProgramasacademiaControlador();
            $programa_academia->entidad->idProgramasAcademia = $fila->idProgramaAcademia;
            $mi_programa = $programa_academia->modelo->get($programa_academia->entidad);
            $nivel = new NivelpControlador();
            $nivel->entidad->idNivelp = $fila->programaNivel;
            $nivel_matricula = $nivel->modelo->get($nivel->entidad);
            $costos = new CostoControlador();
            $costos->entidad->tipoCosto = $fila->idProgramaAcademia;
            $costos_programa = $costos->modelo->get_costo_por_programa($costos->entidad);

    ?>
            <div class="mt-2">
                <h5 class="m-0 pb-2">
                    <a class="text-dark" data-bs-toggle="collapse" href="#todayTasks<?php echo $fila->idMatricula; ?>" role="button" aria-expanded="false" aria-controls="todayTasks">
                        <i class='uil uil-angle-down font-18'></i><?php echo ($nivel_matricula->respuesta) ? $mi_programa->resultado->nombreProgramasAcademia . '-' . $nivel_matricula->resultado->descripcionNivelp : $mi_programa->resultado->nombreProgramasAcademia; ?> <span class="text-muted"> (<?php echo (count($costos_programa->resultado)); ?>)</span>
                    </a>
              
                </h5>

                <div class="collapse show" id="todayTasks<?php echo $fila->idMatricula; ?>">
                    <div class="card mb-0">
                        <div class="card-body">
                            <!-- task -->
                            <?php if ($costos_programa->respuesta) {
                                $costo_p = $costos_programa->resultado;
                                foreach ($costo_p as $costo) { ?>
                                    <div class="row justify-content-sm-between">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <h3> <button type="button" class="btn btn-sm btn-primary"  >
                                                    <?php echo $costo->nombreCosto; ?>
                                                </button>
                                                </h3>
                                        </div> <!-- end col -->
                                    </div>
                                    <br>
                                    <?php
                                    $cuota = new CuotaControlador();
                                    $cuota->entidad->idMatricula = $fila->idMatricula;
                                    $cuota->entidad->idCosto = $costo->idCosto;
                                    $miscuotas = $cuota->modelo->get_cuota_por_matricula($cuota->entidad);
                                    ?>
                                    <!-- end task -->
                                    <table class="table table-centered mb-0" id="tabla_cuotas">
                                        <thead class="table-dark">
                                            <tr>
                                                <!-- <th>Id</th> -->
                                                <th><?php echo ($costo->nombreCosto == 'Simulacros') ? 'Semana' : 'Cuota';  ?></th>
                                                <th>Monto</th>
                                                <?php if ($costo->nombreCosto == 'Matrícula') { ?>
                                                    <th>Fecha de Vencimiento</th>
                                                <?php } ?>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($miscuotas->respuesta) {
                                                $mis_cuotas_programa = $miscuotas->resultado;
                                                foreach ($mis_cuotas_programa as $micuota) { ?>
                                                    <tr>
                                                        <!-- <td><?php //echo $micuota->idCuota;  ?></td> -->
                                                        <td><?php echo $micuota->nroCuota;  ?></td>
                                                        <td><?php echo "S/.  " . number_format($micuota->totalCuota, 2);;  ?></td>
                                                        <?php if ($costo->nombreCosto == 'Matrícula') { ?>
                                                            <td>
                                                                <?php echo date("d/m/Y", strtotime($micuota->fechaVencimientoCuota));  ?>
                                                            </td>
                                                        <?php } ?>
                                                        <td>
                                                            <?php switch ($micuota->estadoCuota) {
                                                                case '1': ?>
                                                                    <i class="mdi mdi-circle text-warning"></i> Pendiente
                                                                <?php break;
                                                                case '2': ?>
                                                                    <i class="mdi mdi-circle text-success"></i> Cancelado
                                                                <?php break;
                                                                case '4': ?>
                                                                    <i class="mdi mdi-circle text-info"></i> Validando Pago
                                                                <?php break;
                                                                default: ?>
                                                                    <i class="mdi mdi-circle text-danger"></i> Vencido
                                                            <?php break;
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-success" id="btn-ver-detalles" data-bs-toggle="modal" data-bs-target="#primary-header-modal" data-id="<?php echo $micuota->idCuota;  ?>" data-codigo="<?php echo $costo->idCosto;  ?>" data-nombre="<?php echo $costo->nombreCosto;  ?>"><i class="uil-money-withdrawal"></i> Cancelar</button>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <i class="dripicons-warning me-2"></i> No tiene <strong> pagos </strong>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <br>
                                <?php
                                }
                            } else {
                                ?>
                                <div class="alert alert-warning" role="alert">
                                    <i class="dripicons-warning me-2"></i> No tiene <strong> pagos en esta seccion</strong>
                                </div>
                            <?php
                            }
                            ?>
                        </div> <!-- end card-body-->
                    </div> <!-- end card -->
                </div> <!-- end .collapse-->
            </div> <!-- end .mt-2-->
        <?php
        }
    } else {
        ?>
        <div class="alert alert-warning" role="alert">
            <i class="dripicons-warning me-2"></i> No tiene <strong>Tiene aun pagos, primero registre su matrícula</strong>
        </div>
    <?php
    }
    ?>
</div>




<div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-guinda">
                <h4 class="modal-title" id="primary-header-modalLabel">Registrar Pago</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="?c=pago&a=crearPago" method="post" id="formCrearPago" enctype="multipart/form-data">
               <input type="hidden" id="idCuota" name="idCuota">
               <input type="hidden" id="conceptoPago" name="conceptoPago">
                <input type="hidden" value="<?php echo $_SESSION['idEstudiante'] ?>" name="idEstudiante">    
                <div class="position-relative mb-3">
                        <label class="form-label" for="montoPago">Monto Cancelado</label>
                        <input type="number" step="any" class="form-control" name="montoPago" placeholder="Monto Pagado" required>
                        <div class="valid-tooltip">
                            Genial!
                        </div>
                        <div class="invalid-tooltip">
                            Ingrese un monto válido.
                        </div>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="tipoPago" class="form-label">Tipo de Pago</label>
                        <select class="form-select" id="tipoPago" name="tipoPago">
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
                        <label class="form-label" for="operacionPago">Nro de Operación</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="operacionPago" placeholder="Nro de Operación" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="invalid-tooltip">
                                Por favor ingresa un numero válido.
                            </div>
                        </div>
                    </div>
                    
                    <div class="position-relative mb-3">
                        <label for="reciboPago" class="form-label">Recibo</label>
                        <input type="file"   id="reciboPago" name="reciboPago"class="form-control" required accept="image/*">
                        <div class="invalid-tooltip">
                           Por favor seleccion un recibo.
                        </div>
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-guinda">Guardar</button>
            </div>
                </form>

            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

