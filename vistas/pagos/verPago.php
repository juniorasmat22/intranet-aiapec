<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="?">Incio</a></li>
                    <li class="breadcrumb-item"><a href="?c=matricula">Matrícula</a></li>
                    <li class="breadcrumb-item"><a href="javascript: history.back();">Detalle Matricula</a></li>
                    <li class="breadcrumb-item active">Pagos</li>
                </ol>
            </div>
            <h4 class="page-title" id="tituloReporte">Detalle de Pago</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-7">
                        <form class="ps-lg-4">
                            <!-- Product information -->
                            <div class="mt-4">
                                <div class="col-md-4">
                                    <h6 class="font-14">Pago ID:</h6>
                                    <p class="text-sm lh-150"><?php echo sprintf("%05d", $respuesta->resultado->idPago); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="font-14">Tipo de Pago :</h6>
                                    <p class="text-sm lh-150"><?php echo $respuesta->resultado->tipoPago; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="font-14">Número de Operación :</h6>
                                    <p class="text-sm lh-150"><?php echo $respuesta->resultado->operacionPago; ?></p>
                                </div>

                                <div class="col-md-8">
                                    <h6 class="font-14">Fecha de Registro :</h6>
                                    <p class="text-sm lh-150"><?php echo date("d/m/Y h:i:s A", strtotime($respuesta->resultado->fechaPago));  ?> </p>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="font-14">Estado:</h6>
                                    <p class="text-sm lh-150"> <?php
                                                                switch ($respuesta->resultado->estadoPago) {
                                                                    case '1':
                                                                        echo '<span class="badge badge-warning-lighten">Pendiente</span>';
                                                                        break;
                                                                    case '2':
                                                                        echo '<span class="badge badge-success-lighten">Aprobado</span>';
                                                                        break;
                                                                    case '3':
                                                                        echo '<span class="badge badge-danger-lighten">Rechazado</span>';
                                                                        break;
                                                                    default:
                                                                        # code...
                                                                        break;
                                                                }
                                                                ?> </p>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="font-14">Monto Total Pagado :</h6>
                                    <p class="text-sm lh-150"><?php echo  "S/.  " . number_format($respuesta->resultado->totalPago, 2); ?></p>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end col -->
                    <div class="col-lg-5">
                        <!-- Product image -->
                        <a href="data:image/jpg;base64,<?php echo base64_encode($respuesta->resultado->reciboPago); ?>" class="text-center d-block mb-4">
                            <img src="data:image/jpg;base64,<?php echo base64_encode($respuesta->resultado->reciboPago); ?>" class="img-fluid" style="max-width: 280px;" alt="Product-img">
                        </a>
                        <?php if ($respuesta->resultado->estadoPago!=2) {?>
                            <form id="formActualizarRecibo" method="POST" action="?c=pago&a=editarRecibo" enctype="multipart/form-data">
                            <input type="hidden" name="idPago" id="idPago" value="<?php echo $respuesta->resultado->idPago; ?>">
                            <div class="row g-2">
                                <div class="col-sm">
                                    <label class="form-label">Actualizar recibo</label>
                                    <input class="form-control" type="file" id="reciboPago" name="reciboPago" accept=".jpg, .jpeg" required>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success"><i class="mdi mdi-rocket me-1"></i> <span>Actualizar recibo</span> </button>
                        </form>
                        <?php }?>
                        
                    </div> <!-- end col -->
                </div> <!-- end row-->
                <h6 class="font-14">Detalle del pago:</h6>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-centered mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Concepto de Pago</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($mi_detalle->respuesta) {
                                $filas = $mi_detalle->resultado;
                                foreach ($filas as $fila) {

                            ?>
                                    <tr>

                                        <td><?php echo $fila->conceptoPago ?></td>
                                        <td><?php echo   "S/.  " . number_format($fila->montoPago, 2); ?></td>

                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <i class="dripicons-wrong me-2"></i> No hay <strong>detalle del pago
                                </div>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>

