<?php

use controladores\AreaControlador;
use controladores\CarreraControlador;
use controladores\GradoControlador;
use controladores\NivelControlador;

  ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="?">Estudiante</a></li>
                    <li class="breadcrumb-item active">Perfil</li>
                </ol>
            </div>
            <h4 class="page-title" id="tituloReporte">Perfil del Estudiante</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                    <li class="nav-item">
                        <a href="#aboutme" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                            Datos Personales
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#timeline" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 ">
                            Datos Académicos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                            Datos Escolares
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="aboutme">
                        <form class="needs-validation" novalidate action="?c=estudiante&a=editar" method="post" id="formEditar">
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-box me-1"></i> Datos del Estudiante</h5>
                            <input type="hidden" id="idEstudiante" name="idEstudiante" value="<?php echo $estudiante->resultado->idEstudiante; ?>">
                            <input type="hidden" id="tycEstudiante" name="tycEstudiante" value="<?php echo $estudiante->resultado->tycEstudiante; ?>">
                            <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $estudiante->resultado->idUsuario; ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tipodocumentoEstudiante" class="form-label">Documento</label>
                                        <!-- <select class="form-control select2"   name="tipodocumentoEstudiante" id="tipodocumentoEstudiante" data-toggle="select2" readonly="readonly">
                                    <option value="D.N.I" <?php //if ( $estudiante->resultado->tipodocumentoEstudiante == 'D.N.I') echo 'selected'; 
                                                            ?>>D.N.I</option>
                                    <option value="Carnet de extranjería" <?php // if ( $estudiante->resultado->tipodocumentoEstudiante == 'Carnet de extranjería') echo 'selected'; 
                                                                            ?>>Carnet de extranjería</option>
                                    <option value="Pasaporte" <?php // if ( $estudiante->resultado->tipodocumentoEstudiante == 'Pasaporte') echo 'Pasaporte'; 
                                                                ?>>Pasaporte</option>
                                </select> -->
                                        <input type="text" readonly="readonly" value="<?php echo $estudiante->resultado->tipodocumentoEstudiante; ?>" class="form-control" name="tipodocumentoEstudiante" id="tipodocumentoEstudiante" placeholder="Ingrese su tipo de documento">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="numerodocumentoEstudiante" class="form-label">Nro. Documento</label>
                                        <input type="number" readonly="readonly" value="<?php echo $estudiante->resultado->numerodocumentoEstudiante; ?>" class="form-control" name="numerodocumentoEstudiante" id="numerodocumentoEstudiante" placeholder="Ingrese su número de documento">
                                        <span class="font-13 text-muted">En caso desees modificar tu número de documento, contactar con soporte</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="apellidoEstudiante" class="form-label">Apellidos</label>

                                        <input maxlength="45" data-toggle="maxlength" type="text" class="form-control" required value="<?php echo $estudiante->resultado->apellidoEstudiante; ?>" id="apellidoEstudiante" name="apellidoEstudiante" placeholder="Ingrese sus Apellidos">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nombresEstudiante" class="form-label">Nombres</label>
                                        <input type="text" maxlength="45" data-toggle="maxlength" class="form-control" required name="nombresEstudiante" id="nombresEstudiante" value="<?php echo $estudiante->resultado->nombresEstudiante; ?>" placeholder="Ingrese sus Nombres">
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="correoEstudiante" class="form-label">Correo</label>
                                        <input type="text" maxlength="45" data-toggle="maxlength" class="form-control" required id="correoEstudiante" name="correoEstudiante" value="<?php echo $estudiante->resultado->correoEstudiante; ?>" placeholder="Ingrese su número de celular">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="celularEstudiante" class="form-label">Celular</label>
                                        <input type="number" maxlength="9" data-toggle="maxlength" class="form-control" id="celularEstudiante" value="<?php echo $estudiante->resultado->celularEstudiante; ?>" name="celularEstudiante" placeholder="Ingrese su correo electrónico">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fechaNacimientoEstudiante" class="form-label">Fecha de Nacimiento</label>
                                        <div class="mb-3 position-relative" id="datepicker1">
                                            <input type="text" class="form-control" data-provide="datepicker" required data-date-container="#datepicker1" name="fechaNacimientoEstudiante" id="fechaNacimientoEstudiante" value="<?php echo $estudiante->resultado->fechaNacimientoEstudiante; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sexoEstudiante" class="form-label">Sexo</label>
                                        <select class="form-control select2" name="sexoEstudiante" id="sexoEstudiante" required data-toggle="select2">
                                            <option value="0" disabled selected>Seleccione un opción</option>
                                            <option value="M" <?php if ($estudiante->resultado->sexoEstudiante == 'M') echo 'selected'; ?>>Masculino</option>
                                            <option value="F" <?php if ($estudiante->resultado->sexoEstudiante == 'F') echo 'selected'; ?>>Femenino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative mb-3">
                                        <label for="situacionEstudiante" class="form-label">Situación del Estudiante</label>
                                        <select class="form-control select2" name="situacionEstudiante" id="situacionEstudiante" required data-toggle="select2">
                                            <option value="" selected disabled>Selecione una opción</option>
                                            <option value="Estudiante Escolar" <?php if ($estudiante->resultado->situacionEstudiante == 'Estudiante Escolar') echo 'selected'; ?>>Estudiante Escolar</option>
                                            <option value="Egresado de Secundaria" <?php if ($estudiante->resultado->situacionEstudiante == 'Egresado de Secundaria') echo 'selected'; ?>>Egresado de Secundaria</option>
                                        </select>
                                        <div class="valid-tooltip">
                                            Genial!
                                        </div>
                                        <div class="invalid-tooltip">
                                            Seleccione una opción.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative mb-3">
                                        <label for="tipoEstudiante" class="form-label">Tipo de Estudiante</label>
                                        <select class="form-control select2" name="tipoEstudiante" id="tipoEstudiante" required data-toggle="select2">
                                            <option value="" selected disabled>Selecione una opción</option>
                                            <option value="1" <?php if ($estudiante->resultado->tipoEstudiante == '1') echo 'selected'; ?>>Aiapaec</option>
                                            <option value="2" <?php if ($estudiante->resultado->tipoEstudiante == '2') echo 'selected'; ?>>Externo</option>
                                        </select>
                                        <div class="valid-tooltip">
                                            Genial!
                                        </div>
                                        <div class="invalid-tooltip">
                                            Seleccione una opción.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative mb-3">
                                        <label for="estadoEstudiante" class="form-label">Estado</label>
                                        <select class="form-control select2" name="estadoEstudiante" id="estadoEstudiante" required data-toggle="select2">
                                            <option value="" selected disabled>Selecione una opción</option>
                                            <option value="1" <?php if ($estudiante->resultado->estadoEstudiante == '1') echo 'selected'; ?>>Activo</option>
                                            <option value="2" <?php if ($estudiante->resultado->estadoEstudiante == '2') echo 'selected'; ?>>Inactivo</option>
                                        </select>
                                        <div class="valid-tooltip">
                                            Genial!
                                        </div>
                                        <div class="invalid-tooltip">
                                            Seleccione una opción.
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="direccionEstudiante" class="form-label">Dirección</label>
                                        <textarea maxlength="100" data-toggle="maxlength" class="form-control" required id="direccionEstudiante" name="direccionEstudiante" rows="2" placeholder="Indique su dirección: ..."><?php echo $estudiante->resultado->direccionEstudiante; ?></textarea>
                                        <span class="font-13 text-muted">e.g "Calle, número - Distrito."</span>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-tie me-1"></i> Datos del Apoderado</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="dniApoderadoEstudiante" class="form-label">D.N.I</label>
                                        <input type="number" readonly maxlength="8" data-toggle="maxlength" required class="form-control" id="dniApoderadoEstudiante" name="dniApoderadoEstudiante" placeholder="Ingrese su número de documento" value="<?php echo $estudiante->resultado->dniApoderadoEstudiante; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="apellidoApoderadoEstudiante" class="form-label">Apellidos</label>
                                        <input type="text" maxlength="45" data-toggle="maxlength" required class="form-control" name="apellidoApoderadoEstudiante" id="apellidoApoderadoEstudiante" placeholder="Ingrese sus Apellidos" value="<?php echo $estudiante->resultado->apellidoApoderadoEstudiante; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nombreApoderadoEstudiante" class="form-label">Nombres</label>
                                        <input type="text" maxlength="45" data-toggle="maxlength" class="form-control" required name="nombreApoderadoEstudiante" id="nombreApoderadoEstudiante" placeholder="Ingrese sus Nombres" value="<?php echo $estudiante->resultado->nombreApoderadoEstudiante; ?>">
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="celularApoderadoEstudiante" class="form-label">Celular</label>
                                        <input type="text" class="form-control" id="celularApoderadoEstudiante" required name="celularApoderadoEstudiante" placeholder="Ingrese su número de celular" value="<?php echo $estudiante->resultado->celularApoderadoEstudiante; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="correoApoderadoEstudiante" class="form-label">Correo</label>
                                        <input type="email" maxlength="45" data-toggle="maxlength" required class="form-control" name="correoApoderadoEstudiante" id="correoApoderadoEstudiante" placeholder="Ingrese su correo electrónico" value="<?php echo $estudiante->resultado->correoApoderadoEstudiante; ?>">
                                    </div>
                                </div>
                            </div> <!-- end row -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Actualizar</button>
                            </div>
                        </form>

                    </div> <!-- end tab-pane -->
                    <!-- end about me section content -->

                    <div class="tab-pane" id="timeline">



                        <?php if ($estudiante_pre->respuesta) { 
                            $carrera=new CarreraControlador(); 
                            $carrera->entidad->idCarrera=$estudiante_pre->resultado->idCarrera;
                            $carera_estudiante=$carrera->modelo->get($carrera->entidad);
                            $area= new AreaControlador();
                            $area->entidad->idArea=$carera_estudiante->resultado->idArea;
                            $area_estudiante=$area->modelo->get($area->entidad);
                            $id_estudiante=$estudiante_pre->resultado->idPre;
                            
                             ?>
                            <div class="text-start mt-3">
                                <p class="text-muted mb-2 font-15"><strong>Modalidad de Postulación :</strong> <span class="ms-2"><?php echo $estudiante_pre->resultado->modalidadEstudiante ?></span></p>
                                <p class="text-muted mb-2 font-15"><strong>Área :</strong><span class="ms-2"><?php echo  ( $area_estudiante->respuesta) ? $area_estudiante->resultado->nombreArea : "Error al cargar el área" ;?></span></p>
                                <p class="text-muted mb-2 font-15"><strong>Carrera a la que postula :</strong> <span class="ms-2 "><?php echo ($carera_estudiante->respuesta) ? $carera_estudiante->resultado->nombreCarrera : "Error al cargar la carrera" ; ?></span></p>
                            </div>
                            <a <?php echo "href='?c=estudiantepre&a=get&idPre=$id_estudiante'" ?> class="action-icon editar"> <i class="mdi mdi-square-edit-outline"></i></a>
                        <?php } else { ?>
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <a href="javascript:void(0);" class="btn btn-guinda mb-2" data-bs-toggle="modal" data-bs-target="#crearModal"><i class="mdi mdi-plus-circle me-2"></i> Agregar Datos</a>
                                </div>
                            </div>
                        <?php  }
                        ?>
                    </div>
                    <!-- end timeline content-->

                    <div class="tab-pane" id="settings">
                    <?php if ($estudiante_escolar->respuesta) { 
                        $nivel=new NivelControlador();
                        $grado=new GradoControlador();
                        $grado->entidad->idGrado=$estudiante_escolar->resultado->idGrado;
                        $grado_estudiante= $grado->modelo->get($grado->entidad);
                        $nivel->entidad->idNivel=$grado_estudiante->resultado->idNivel;
                        $nivel_estudiante=$nivel->modelo->get( $nivel->entidad);
                             ?>
                            <div class="text-start mt-3">
                                <p class="text-muted mb-2 font-15"><strong>Nivel :</strong> <span class="ms-2"><?php echo  ($nivel_estudiante->respuesta) ? $nivel_estudiante->resultado->descripcionNivel : "Error al obtener el nivel" ; ?></span></p>
                                <p class="text-muted mb-2 font-15"><strong>Grado :</strong><span class="ms-2"><?php echo ($grado_estudiante->respuesta) ? $grado_estudiante->resultado->descripcionGrado: "Error al obtner el grado/año" ; ?></span></p>
                                <p class="text-muted mb-2 font-15"><strong>Colegio de Procedencia :</strong> <span class="ms-2 "><?php echo  $estudiante_escolar->resultado->colegioEscolar ?></span></p>
                                <p class="text-muted mb-2 font-15"><strong>Sede :</strong> <span class="ms-2 "><?php switch ($estudiante_escolar->resultado->sedeColegio) {
                                    case '1':
                                        echo "El Bosque";
                                        break;
                                    case '2':
                                        echo "Molino";
                                        break;
                                    case '3':
                                        echo "San Andrés";
                                        break;
                                     case '4':
                                        echo "El Molino";
                                        break;
                                    default:
                                    echo "No aplica";
                                        break;
                                } ?></span></p>
                                <p class="text-muted mb-2 font-15"><strong>Sección :</strong> <span class="ms-2 "><?php echo $estudiante_escolar->resultado->seccionColegio ?></span></p>
                                
                            </div>
                            <?php }
                             else { ?>
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <a href="javascript:void(0);" class="btn btn-guinda mb-2" data-bs-toggle="modal" data-bs-target="#crearModalEscolar"><i class="mdi mdi-plus-circle me-2"></i> Agregar Datos</a>
                                </div>
                            </div>
                        <?php  }
                        ?>

                    </div>
                    <!-- end settings content-->

                </div> <!-- end tab-content -->
            </div> <!-- end card body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>


<!-- modal de creación -->
<div id="crearModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-guinda">
                <h4 class="modal-title" id="crearModalLabel">Crear Datos Acádemicos</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <?php require 'crear.pre.php'; ?>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- MODAL DE EDICIÓN -->
<div id="editarModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-guinda">
                <h4 class="modal-title" id="editarModalLabel">Editar Datos Académicos</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <?php require 'actualizar.pre.php'; ?>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- modal de creación escolar -->
<div id="crearModalEscolar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-guinda">
                <h4 class="modal-title" id="crearModalLabel">Crear Datos Escolares</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <?php require 'crear.escolar.php'; ?>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- MODAL DE EDICIÓN -->
<div id="editarModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-guinda">
                <h4 class="modal-title" id="editarModalLabel">Editar Datos Académicos</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <?php require 'actualizar.pre.php'; ?>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
    function funcionOpcionEditar(estudiantePre){
      $('#formEditar input[name="idPre"]').val(estudiantePre.idPre);
      $('#formEditar select[name="idCarrera"]').val(estudiantePre.idCarrera);
      $('#formEditar input[name="idEstudiante"]').val(estudiantePre.idEstudiante);
      $('#formEditar select[name="modalidadEstudiante"]').val(estudiantePre.modalidadEstudiante);
      
    }
  </script>