<div class="row">
    <div class="col-12">
        <h4 class="mb-4">Departamento de Piscología</h4>
    </div> <!-- end col -->
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="row row-cols-1 row-cols-md-3 g-3">
            <?php
            $filas = $respuesta->resultado->objetos;
            if (count($filas) > 0) { ?>
                <?php foreach ($filas as $fila) {
                    $tipo = ($fila->tipoInforme == '1') ? 'Informe Psicológico' : 'Informe de Orientación Vocacional';
                ?>
                    <div class="col">
                        <div class="card">
                            <img src="recursos/assets/images/small/small-1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <form action="?c=psicologia&a=informe" method="post">
                                    <input type="hidden" name="idPsicologia" value="<?php echo $fila->idPsicologia; ?>">
                                    <h5 class="card-title">
                                        <p ><?php echo $tipo?></p>
                                    </h5>
                                    <button type="submit" class="btn  btn btn-outline-info" style="text-align: left;">
                                    <i class="uil-eye"></i>
                                            Ver Informe
                                    </button>
                                </form>
                                <p class="card-text">
                                    Some quick example text to build on the card up the bulk of the card's content.
                                </p>
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div>
                <?php  } ?>
            <?php } else { ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Informes pendientes </strong>
                </div>
            <?php } ?>
        </div>
    </div> <!-- end col-->