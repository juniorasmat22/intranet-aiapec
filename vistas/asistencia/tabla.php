<?php $filas = $mi_asistencia->resultado; ?>
<div class="row">
    <div class="col col-lg-12">
        <div class="card">
            <div class="card-body" style="position: relative;">
                <!-- <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop p-0" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:void(0);" class="dropdown-item">Refresh Report</a>
                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                    </div>
                </div> -->
                <h4 class="header-title">Detalle de Asistencia</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-sm mb-0 font-13">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Turno</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($filas as $fila) { 
                                 $estado="";
                            switch ( $fila->estadoAsistencia) {
                                case '1':
                                    $estado="A";
                                    break;
                                case '2':
                                    $estado="T";
                                    break;
                                case '3':
                                    $estado="FJ";
                                    break;
                                case '4':
                                    $estado="F";
                                    break;
                                 case '5':
                                    $estado="TJ";
                                    break;
                                default:
                                $estado="";
                
                                    break;
                            }    
                                
                            ?>

                                <tr>
                                    <td>
                                        <?php echo date("d/m/Y", strtotime( $fila->fechaAsistencia)) ;   ?>
                                    </td>
                                    <td> <?php echo  ($fila->turnoAsistencia=='M') ? 'Mañana' : 'Tarde' ;   ?></td>
                                    <td> <?php echo $estado;   ?></td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>