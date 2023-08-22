<?php

namespace controladores;

$area = new AreaControlador();
$lista_areas = $area->modelo->listar();

$nivel = new NivelControlador();
$lista_niveles = $nivel->modelo->listar();

?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Estudiante</a></li>
                    <li class="breadcrumb-item active">Mi Perfil</li>
                </ol>
            </div>
            <h4 class="page-title">Mi Perfil</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-xl">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-3"> Hola <?php echo $_SESSION['name']; ?>,</h4>

                <form action="#"  method="post" >
                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i> Datos del Estudiante</h5>
                    <input type="hidden" id="idEstudiante" name="idEstudiante" value="<?php echo $_SESSION['idEstudiante']; ?>">
                    <input type="hidden" id="tycEstudiante" name="tycEstudiante" value="<?php  echo $estudiante->resultado->tycEstudiante; ?>">
                    <input type="hidden" id="idUsuario" name="idUsuario" value="<?php  echo $_SESSION['id']; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tipodocumentoEstudiante" class="form-label">Documento</label>
                                <!-- <select class="form-control select2"   name="tipodocumentoEstudiante" id="tipodocumentoEstudiante" data-toggle="select2" readonly="readonly">
                                    <option value="D.N.I" <?php //if ( $estudiante->resultado->tipodocumentoEstudiante == 'D.N.I') echo 'selected'; ?>>D.N.I</option>
                                    <option value="Carnet de extranjería" <?php // if ( $estudiante->resultado->tipodocumentoEstudiante == 'Carnet de extranjería') echo 'selected'; ?>>Carnet de extranjería</option>
                                    <option value="Pasaporte" <?php // if ( $estudiante->resultado->tipodocumentoEstudiante == 'Pasaporte') echo 'Pasaporte'; ?>>Pasaporte</option>
                                </select> -->
                                <input type="text" readonly="readonly" value="<?php echo $estudiante->resultado->tipodocumentoEstudiante; ?>" class="form-control" name="tipodocumentoEstudiante" id="tipodocumentoEstudiante"  placeholder="Ingrese su tipo de documento">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="numerodocumentoEstudiante" class="form-label">Nro. Documento</label>
                                <input type="number" readonly="readonly" value="<?php echo $estudiante->resultado->numerodocumentoEstudiante; ?>" class="form-control" name="numerodocumentoEstudiante" id="numerodocumentoEstudiante"  placeholder="Ingrese su número de documento">
                                <span class="font-13 text-muted">En caso desees modificar tu número de documento, contactar con soporte</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="apellidoEstudiante" class="form-label">Apellidos</label>
                                
                                <input maxlength="25" data-toggle="maxlength" type="text" class="form-control" required value="<?php echo $estudiante->resultado->apellidoEstudiante; ?>" id="apellidoEstudiante" name="apellidoEstudiante" placeholder="Ingrese sus Apellidos">
                                 </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nombresEstudiante" class="form-label">Nombres</label>
                                <input type="text" maxlength="25" data-toggle="maxlength" class="form-control" required name="nombresEstudiante" id="nombresEstudiante" value="<?php echo $estudiante->resultado->nombresEstudiante; ?>" placeholder="Ingrese sus Nombres">
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="correoEstudiante" class="form-label">Correo</label>
                                <input type="text" maxlength="30" data-toggle="maxlength" class="form-control" required id="correoEstudiante" name="correoEstudiante" value="<?php echo $estudiante->resultado->correoEstudiante; ?>" placeholder="Ingrese su número de celular">
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
                                    <input type="text" class="form-control" data-provide="datepicker" value="<?php  echo $estudiante->resultado->fechaNacimientoEstudiante; ?>" required data-date-container="#datepicker1" name="fechaNacimientoEstudiante" id="fechaNacimientoEstudiante">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sexoEstudiante" class="form-label">Sexo</label>
                                <select class="form-control select2" name="sexoEstudiante" id="sexoEstudiante"  required data-toggle="select2">
                                    <option value="0" disabled selected>Seleccione un opción</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>
                    </div> <!-- end row -->
                   
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="direccionEstudiante" class="form-label">Dirección</label>
                                <textarea maxlength="100" data-toggle="maxlength" class="form-control" required id="direccionEstudiante"  name="direccionEstudiante" rows="2" placeholder="Indique su dirección: ..."> <?php echo $estudiante->resultado->direccionEstudiante; ?> </textarea>
                                <span class="font-13 text-muted">e.g "Calle, número - Distrito."</span>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->


                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i>Datos del Apoderado</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="dniApoderadoEstudiante" class="form-label">D.N.I</label>
                                <input type="number" maxlength="8" data-toggle="maxlength" required class="form-control" value="<?php  echo $estudiante->resultado->dniApoderadoEstudiante; ?>" id="dniApoderadoEstudiante" name="dniApoderadoEstudiante" placeholder="Ingrese su número de documento">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="apellidoApoderadoEstudiante" class="form-label">Apellidos</label>
                                <input type="text" maxlength="45" data-toggle="maxlength" required class="form-control"  value="<?php  echo $estudiante->resultado->apellidoApoderadoEstudiante; ?>"  name="apellidoApoderadoEstudiante" id="apellidoApoderadoEstudiante" placeholder="Ingrese sus Apellidos">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nombreApoderadoEstudiante" class="form-label">Nombres</label>
                                <input type="text" maxlength="45" data-toggle="maxlength" class="form-control" required  value="<?php  echo $estudiante->resultado->nombreApoderadoEstudiante; ?>" name="nombreApoderadoEstudiante" id="nombreApoderadoEstudiante" placeholder="Ingrese sus Nombres">
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="celularApoderadoEstudiante" class="form-label">Celular</label>
                                <input type="text" class="form-control" id="celularApoderadoEstudiante"  required  value="<?php  echo $estudiante->resultado->celularApoderadoEstudiante; ?>" name="celularApoderadoEstudiante" placeholder="Ingrese su número de celular">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="correoApoderadoEstudiante" class="form-label">Correo</label>
                                <input type="email" maxlength="30" data-toggle="maxlength"  required class="form-control" name="correoApoderadoEstudiante" value="<?php  echo $estudiante->resultado->correoApoderadoEstudiante; ?>" id="correoApoderadoEstudiante" placeholder="Ingrese su correo electrónico">
                            </div>
                        </div>
                    </div> <!-- end row -->

                    
                    <!-- <div class="text-end">
                        <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                    </div> -->
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->

