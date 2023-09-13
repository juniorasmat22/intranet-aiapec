<?php

namespace controladores;

$area = new AreaControlador();
$lista_areas = $area->modelo->listar();

?>
<form class="needs-validation" novalidate action="?c=estudiantepre&a=crear" method="post" id="formCrear">
    <input type="hidden" id="idEstudiante" name="idEstudiante" value="<?php echo  $estudiante->resultado->idEstudiante; ?>">
    <div class="row">
        <div class="col-md-6">
            <div class="position-relative mb-3">
                <label for="modalidadEstudiante" class="form-label">Modalidad de Postulación</label>
                <select id="modalidadEstudiante" name="modalidadEstudiante" required class="form-select">
                    <option selected disabled>Modalidad de Postulación</option>
                    <option>Ordinario</option>
                    <option>Cepunt</option>
                    <option>Excelencia</option>
                    <option>5to Secundaria</option>
                </select>
                <div class="valid-tooltip">
                    Genial!
                </div>
                <div class="invalid-tooltip">
                    Seleccione una modalidad
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="position-relative mb-3">
                <label for="idArea" class="form-label">Área</label>
                <select class="form-select" id="idArea" name="idArea" required onchange="llenar_carreras(1)">
                    <option value="" selected disabled>Selecione una opción</option>
                    <?php
                    if ($lista_areas->respuesta) {
                        $filas_areas = $lista_areas->resultado->objetos;

                        foreach ($filas_areas as $area) {

                    ?>

                            <option value="<?php echo $area->idArea; ?>"><?php echo $area->nombreArea; ?></option>

                        <?php
                        }
                    } else {
                        ?>
                        <option disabled>No existen Áreas Registradas</option>
                    <?php
                    }
                    ?>
                </select>
                <div class="valid-tooltip">
                    Genial!
                </div>
                <div class="invalid-tooltip">
                    Seleccione una área
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="position-relative mb-3">
                <label for="idCarrera" class="form-label">Carrera</label>
                <select id="idCarrera" name="idCarrera" required class="form-select">
                    <option selected disabled value="">Seleccione Carrera</option>
                    
                </select>
                <div class="valid-tooltip">
                    Genial!
                </div>
                <div class="invalid-tooltip">
                    Seleccione una modalidad
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-guinda">Guardar</button>
    </div>
</form>