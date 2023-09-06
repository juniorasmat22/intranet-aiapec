<form class="needs-validation" novalidate action="?c=registroconcurso&a=editar" method="post" id="formEditar" enctype="multipart/form-data">
    <input type="hidden" name="idRegistroConcurso" id="idRegistroConcurso">
    <input type="text" name="idConcurso" id="idConcurso">
    <input type="text" name="idEstudiante" id="idEstudiante">
    <div class="row">
        <div class="col-md-6">
            <div class="position-relative mb-3">
                <label class="form-label" for="montopago">Monto Pago</label>
                <input type="number" step="any" class="form-control" name="montopago" data-toggle="maxlength" placeholder="Monto de pago" required>
                <div class="valid-tooltip">
                    Genial!
                </div>
                <div class="invalid-tooltip">
                    Ingrese un monto válido.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="position-relative mb-3">
                <select class="form-select" id="tipoPago" name="tipoPago" required>
                    <option selected disabled value="">Tipo de Pago</option>
                    <option>Transferencia B.C.P</option>
                    <option>Yape</option>
                    <option>Transferencia Interbancaria</option>
                    <option>Efectivo</option>
                </select>
                <div class="invalid-feedback">
                    Por favor, seleccione un tipo de pago.
                </div>

                <div class="valid-tooltip">
                    Genial!
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="position-relative mb-3">
                <label class="form-label" for="operacion">Número de Operación</label>
                <input type="text" step="any" class="form-control" name="operacion" id="operacion" placeholder="Número de Operación" required>
                <div class="valid-tooltip">
                    Genial!
                </div>
                <div class="invalid-tooltip">
                    Ingrese un número de operación válido.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="position-relative mb-3">
                <label for="recibo" class="form-label">Recibo de pago</label>
                <div class="input-group has-validation">
                    <input type="file" class="form-control" aria-label="file example" id="recibo" name="recibo" required>
                    <div class="invalid-feedback">
                        Por favor, seleccione una archivo.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-guinda">Editar</button>
    </div>
</form>