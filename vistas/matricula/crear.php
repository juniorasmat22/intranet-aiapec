 <!-- start page title -->
 <div class="row">
     <div class="col-12">
         <div class="page-title-box">
             <div class="page-title-right">
                 <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="?">Incio</a></li>
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Matrícula</a></li>
                     <li class="breadcrumb-item active">Crear</li>
                 </ol>
             </div>
             <h4 class="page-title">Registrar Matricula</h4>
         </div>
     </div>
 </div>
 <div class="row">
     <div class="card">
         <div class="card-body">
             <h4 class="header-title">Default Alert</h4>
             <p class="text-muted font-14 mb-3">
                 Provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.
                 Alerts are available for any length of text, as well as an optional dismiss
                 button.
             </p>
             <form class="needs-validation" novalidate method="POST" action="?c=matricula&a=crear" id="formCrear">
                  <input type="hidden" name="idEstudiante" value="<?php echo $_SESSION['idEstudiante']?>">
                 <div class="row">
                     <div class="col-md-4">
                         <div class="mb-3">
                             <label class="form-label" for="validationCustom01">Programa</label>
                             <select class="form-control select2" data-toggle="select2" required name="idProgramaAcademia" id="idProgramaAcademia" onchange="llenar_nivel_sede()">
                                 <option disabled selected value="">Seleccione un programa</option>

                                 <?php
                                    if ($lista_programas->respuesta) {
                                        $filas_programas = $lista_programas->resultado;

                                        foreach ($filas_programas as $programa) {
                                    ?>
                                         <option value="<?php echo $programa->idProgramasAcademia; ?>"><?php echo $programa->nombreProgramasAcademia; ?></option>
                                     <?php
                                        }
                                    } else {
                                        ?>
                                     <option disabled>No existen Programas Registradas</option>
                                 <?php
                                    }
                                    ?>
                             </select>
                             <div class="valid-feedback">
                                 Genial!
                             </div>
                             <div class="invalid-feedback">
                                 Seleccionar un programa
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4" id="niveles_programa">
                         <div class="mb-3">
                             <label class="form-label" for="programaNivel">Nivel</label>
                             <select required class="form-control select2" name="programaNivel" id="programaNivel" required data-toggle="select2">
                                 <option selected disabled value="">Seleccione una opción</option>
                             </select>
                             <div class="valid-feedback">
                                 Genial!
                             </div>
                             <div class="invalid-feedback">
                                 Seleccionar un nivel
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4" id="sedes_programa">
                         <div class="mb-3">
                             <label class="form-label" for="programaSede">Sede</label>
                             <select required class="form-control select2" name="programaSede" id="programaSede" required data-toggle="select2">
                                 <option selected disabled>Seleccione una opción</option>
                             </select>
                             <div class="valid-feedback">
                                 Genia!
                             </div>
                             <div class="invalid-feedback">
                                 Seleccionar sede
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-4">
                         <div class="mb-3">
                             <label class="form-label" for="validationCustom01">Cuotas</label>
                             <select class="form-control select2" data-toggle="select2" required name="cuotasMatricula">
                                 <option disabled selected value="">Seleccione una opción</option>
                                 <option value="1">1 Cuota</option>
                                 <option value="2">2 Cuotas</option>
                                 <option value="3">3 Cuotas</option>
                                 <option value="4">4 Cuotas</option>
                             </select>
                             <div class="valid-feedback">
                                 Genial!
                             </div>
                             <div class="invalid-feedback">
                                 Seleccionar un numero de cuotas.
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="mb-3">
                     <div class="form-check">
                         <input type="checkbox" class="form-check-input" id="invalidCheck" required>
                         <label class="form-check-label form-label" for="invalidCheck">Agree to terms
                             and conditions</label>
                         <div class="invalid-feedback">
                             You must agree before submitting.
                         </div>
                     </div>
                 </div>
                 <button class="btn btn-guinda" type="submit">Registrarse</button>
             </form>
         </div>

     </div>

 </div>