<?php

namespace controladores;

$mi_seminario = new SeminarioControlador();
?>
<table id="basic-datatable" class="table dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>Seminario</th>
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
                $mi_seminario->entidad->idSeminario = $fila->idSeminario;
                $rpt_seminario = $mi_seminario->modelo->get($mi_seminario->entidad);

        ?>
                <tr>
                    <td><?php echo $rpt_seminario->resultado->nombreSeminario ?></td>
                    <td><?php echo $fila->montoPagoSeminario ?></td>
                    <td><?php echo $fila->tipoPagoSeminario ?></td>
                    <td><?php echo $fila->operacion ?></td>
                    <td>
                        <img  src="data:image/jpg;base64,<?php echo base64_encode($fila->recibo);?> " class="img-fluid avatar-lg"  alt="recibo-img" title="recibo-img"  height="30">
                    </td>
                    <td><span class="badge <?php echo ($fila->estado == 0) ? "bg-warning" : "bg-success"; ?> "><?php echo ($fila->estado == 0) ? "Pendiente" : "Aprobada"; ?></span></td>
                    <td><?php echo date("d/m/Y h:i:s A", strtotime($fila->fechaMatSeminario)) ?></td>
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