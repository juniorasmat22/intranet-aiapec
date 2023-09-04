<?php

namespace controladores;

$mi_concurso = new ConcursoControlador();
?>
<table id="basic-datatable" class="table dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>Concurso</th>
            <th>Monto Cancelado</th>
            <th>Tipo de Pago</th>
            <th>Operación</th>
            <th>Estado</th>
            <th>Fecha Matrícula</th>
            <th>Opciones</th>
            <th>Recibo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($respuesta->respuesta) {
            $filas = $respuesta->resultado;
            foreach ($filas as $fila) {
                $mi_concurso->entidad->idConcurso = $fila->idConcurso;
                $rpt_concurso = $mi_concurso->modelo->get($mi_concurso->entidad);
        ?>
                <tr>
                    <td><?php echo $rpt_concurso->resultado->nombreConcurso ?></td>
                    <td><?php echo $fila->montopago ?></td>
                    <td><?php echo $fila->tipoPago ?></td>
                    <td><?php echo $fila->operacion ?></td>
                    
                    <td><?php switch ($fila->estado) {
                            case '0':
                                echo '<span class="badge bg-warning">Pendiente</span>';
                                break;
                            case '1':
                                echo '<span class="badge bg-success">Aprobada</span>';
                                break;
                            case '2':
                                echo '<span class="badge bg-danger">Rechazado</span>';
                                break;
                            default:
                                echo '<span class="badge bg-info">Sin estado</span>';
                                break;
                        } ?></td>
                    <td><?php echo date("d/m/Y h:i:s A", strtotime($fila->fechaRegistro)) ?></td>
                    <td>
                        
                        <?php if ($fila->estado == 1) { ?>
                            <a type="button" href="?c=registroconcurso&a=ficha&idFicha=<?php echo $fila->idRegistroConcurso; ?>" class="btn btn-outline-success"><i class="mdi mdi-file-pdf-outline"></i>Ficha</a>
                        <?php } ?>
                        <a type="button" href="" class="btn btn-outline-warning"><i class="mdi mdi-pencil"></i></a>
                    </td>
                    <td>
                        <img src="data:image/jpg;base64,<?php echo base64_encode($fila->recibo); ?> " class="img-fluid avatar-md rounded-circle" alt="recibo-img" title="recibo-img">
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>

        <?php
        }
        ?>
    </tbody>
</table>