
<!-- method="get" action="index.php" -->
<form class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between" method="get" id="formBuscar">
    <input type="hidden" name="c" value="asistencia">
    <input type="hidden" name="a" value="index">

    <div class="col-auto">
        <div class="d-flex align-items-center">
            <label for="fechaInicio" class="form-label me-2">Fecha de Inicio</label>
            <input class="form-control" id="fechaInicio" name="fechaInicio" type="date"  value="<?php echo date('Y-m-d'); ?>">
        </div>
    </div>
    <div class="col-auto">
        <div class="d-flex align-items-center">
            <label for="fechaFin" class="form-label me-2">Fecha de Fin</label>
            <input class="form-control" id="fechaFin" name="fechaFin" type="date"  value="<?php echo date('Y-m-d'); ?>">
        </div>
    </div>
    
    <div class="row mt-2">
        <div class="col-auto">
            <div class="d-flex align-items-center">
                <button type="submit" id="buscar" class="btn btn-success me-2"><i class="mdi mdi-table-search me-1"></i> Filtar</button>
            </div>
        </div>
        <div class="col-auto">
            <div class="d-flex align-items-center">
                <a href="?c=asistencia" type="button" class="btn btn-info  me-2"><i class="mdi mdi-filter-remove me-1"></i>Resetear</a>
            </div>
        </div>
    </div>
</form>