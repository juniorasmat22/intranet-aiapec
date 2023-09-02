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
            <th>Recibo</th>
            <th>Estado</th>
            <th>Fecha Matrícula</th>
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
                    <td>
                        <img  src="data:image/jpg;base64,<?php echo base64_encode($fila->recibo);?> " class="img-fluid avatar-md rounded-circle"  alt="recibo-img" title="recibo-img" >
                    </td>
                    <td><span class="badge <?php echo ($fila->estado == 0) ? "bg-warning" : "bg-success"; ?> "><?php echo ($fila->estado == 0) ? "Pendiente" : "Aprobada"; ?></span></td>
                    <td><?php echo date("d/m/Y h:i:s A", strtotime($fila->fechaRegistro)) ?></td>
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