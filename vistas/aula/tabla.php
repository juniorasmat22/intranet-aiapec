<div class="container-fluid">
    <div class="row">
        <div class="col-xxl">
            <!-- tasks panel -->
            <?php

            use controladores\AulaControlador;
use controladores\EvaluacionControlador;
use controladores\NivelpControlador;
            use controladores\ProgramasacademiaControlador;
            use controladores\SedeControlador;

            if ($mis_matriculas->respuesta) {
                $filas = $mis_matriculas->resultado;
                foreach ($filas as $fila) {
                    $programa_academia = new ProgramasacademiaControlador();
                    $programa_academia->entidad->idProgramasAcademia = $fila->idProgramaAcademia;
                    $mi_programa = $programa_academia->modelo->get($programa_academia->entidad);
                    $nivel = new NivelpControlador();
                    $nivel->entidad->idNivelp = $fila->programaNivel;
                    $nivel_matricula = $nivel->modelo->get($nivel->entidad);

                    $sede = new SedeControlador();
                    $sede->entidad->idSede = $fila->programaSede;
                    $sede_matricula = $sede->modelo->get($sede->entidad);
                    $aula = new AulaControlador();
                    $aula->entidad->idProgramasAcademia = $fila->idProgramaAcademia;
                    $aula->entidad->idSede = $fila->programaSede;
                    $aula->entidad->idNivel = $fila->programaNivel;
                    $mi_aula = $aula->modelo->get_aula_matricula($aula->entidad);
                    $datos_aula = $mi_aula->resultado;
            ?>
                    <div class="mt-2">
                        <h5 class="m-0 pb-2">
                            <a class="text-dark" data-bs-toggle="collapse" href="#todayTasks<?php echo $fila->idMatricula; ?>" role="button" aria-expanded="false" aria-controls="todayTasks">
                                <i class='uil uil-angle-down font-18'></i><?php echo ($nivel_matricula->respuesta) ? $mi_programa->resultado->nombreProgramasAcademia . '-' . $nivel_matricula->resultado->descripcionNivelp : $mi_programa->resultado->nombreProgramasAcademia; ?> <span class="text-muted"> (<?php echo $sede_matricula->respuesta ? $sede_matricula->resultado->nombreSede : ''; ?>)</span>
                            </a>
                        </h5>
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <?php if ($datos_aula->semanal == 1) { ?>
                                <li class="nav-item">
                                    <a href="#home1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Solucionarios Semanales</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($datos_aula->simulacro == 1) { ?>
                                <li class="nav-item">
                                    <a href="#profile1" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 ">
                                        <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Solucionarios Simulacros</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($datos_aula->diario == 1) { ?>
                                <li class="nav-item">
                                    <a href="#settings1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                        <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Solucioanrios Diarios</span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>


                        <div class="tab-content">
                            <?php if ($datos_aula->semanal == 1) { 
                                $evaluacion= new EvaluacionControlador();
                                $evaluacion->entidad->tipoEvaluacion=1;
                                $evaluacion->entidad->idEvaluacion=1;
                                
                                ?>
                                <div class="tab-pane active" id="home1">
                                    <div class="mt-3">
                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="border-0">Nombre</th>
                                                        <th class="border-0">Fecha de Evaluación</th>
                                                        <th class="border-0">Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="ms-2 fw-semibold"><a href="javascript: void(0);" class="text-reset">App Design & Development</a></span>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0">Jan 03, 2020</p>
                                                            <span class="font-12">by Andrew</span>
                                                        </td>
                                                        <td>128 MB</td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div> <!-- end .mt-3-->

                                </div>
                            <?php } ?>
                            <?php if ($datos_aula->simulacro == 1) { ?>
                                <div class="tab-pane show " id="profile1">
                                    <p>solucionario simulacro</p>
                                </div>
                            <?php } ?>
                            <?php if ($datos_aula->diario == 1) { ?>
                                <div class="tab-pane" id="settings1">
                                    <p>solucionario diario</p>
                                </div>
                            <?php } ?>
                        </div>
                    </div> <!-- end .mt-2-->
                <?php
                }
            } else {
                ?>
                <div class="alert alert-warning" role="alert">
                    <i class="dripicons-warning me-2"></i> No tiene <strong>Tiene hay aulas matrícula registrada</strong>
                </div>
            <?php
            }
            ?>
        </div> <!-- end col -->
    </div>
    <!-- end row-->

</div> <!-- container -->