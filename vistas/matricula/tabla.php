<?php
    namespace controladores;
?>
<table id="basic-datatable" class="table dt-responsive nowrap w-100">
    <thead class="table-aiapaec">
        <tr>
            <th>Id</th>
            <th>Semestre</th>
            <th>Programa</th>
            <th>Sede</th>
            <th>Costo</th>
            <th># Cuotas</th>
            <th>Estado</th>
            <th>Fecha Matrícula</th>
        </tr>
    </thead>
    
    <tbody>
    <?php
    namespace controladores;

use entidades\Semestre;

        if ($mis_matriculas->respuesta) {
            $filas = $mis_matriculas->resultado;
            foreach ($filas as $fila) {
                $programa_academia=new ProgramasacademiaControlador();
                $programa_academia->entidad->idProgramasAcademia=$fila->idProgramaAcademia;
                $mi_programa=$programa_academia->modelo->get($programa_academia->entidad);
                

                $semestre= new SemestreControlador();
                $semestre->entidad->idSemestre=$mi_programa->resultado->idSemestre;
                $semestre_matricula=$semestre->modelo->get($semestre->entidad);

                $sede= new SedeControlador();
                $sede->entidad->idSede=$fila->programaSede;
                $sede_matricula=$sede->modelo->get($sede->entidad);

                $nivel= new NivelpControlador();
                $nivel->entidad->idNivelp=$fila->programaNivel;
                $nivel_matricula= $nivel->modelo->get( $nivel->entidad) ;      
        ?>
        <tr>
            <td><?php echo $fila->idMatricula;?></td>
            <td><?php echo $semestre_matricula->resultado->nombreSemestre;?></td>
            <td><?php echo ($nivel_matricula->respuesta) ? $mi_programa->resultado->nombreProgramasAcademia.'-'.$nivel_matricula->resultado->descripcionNivelp : $mi_programa->resultado->nombreProgramasAcademia ;?></td>
            <td><?php echo $sede_matricula->resultado->nombreSede;?></td>
            <td><?php echo "S/.  " . number_format($fila->costoOriginalMatricula, 2);  ?></td>
            <td><?php echo $fila->cuotasMatricula;?></td>
            <td><span class="badge <?php echo  ($fila->estadoMatricula==0) ? "bg-warning" : "bg-success" ;?> "><?php echo  ($fila->estadoMatricula==0) ? "Pendiente" : "Aprobada" ;?></span></td>
            <td><?php echo date("d/m/Y h:i:s A", strtotime( $fila->fechaMatricula)) ?></td>
        </tr>
        <?php
            }
        } else {
            ?>
         <div class="alert alert-warning" role="alert">
             <i class="dripicons-warning me-2"></i> No tiene <strong>matriculas registradas</strong> 
         </div>
     <?php
        }
        ?>
    </tbody>
</table>