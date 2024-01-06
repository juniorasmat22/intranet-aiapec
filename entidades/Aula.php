<?php

namespace entidades;

use PDO;

class Aula extends Entidad
{
    public $idAula;
    public $idProgramasAcademia;
    public $idSede;
    public $idNivel;
    public $idTurno;
    public $cantidadAula;
    public $vacantesAula;
    public $fechaRegistroAula;
    //variable de mi vista aulas
    public $programa;
    public $sede;
    public $nivel;
    public $turno;
    // 
    public $semanal;
    public $simulacro;
    public $diario;

    public function setConsulta($filaConsulta)
    {
        $this->idAula = $this->obtenerColumna($filaConsulta, 'id_aula');
        $this->idProgramasAcademia = $this->obtenerColumna($filaConsulta, 'id_programas_academia');
        $this->idSede = $this->obtenerColumna($filaConsulta, 'id_sede');
        $this->idNivel = $this->obtenerColumna($filaConsulta, 'id_nivel');
        $this->idTurno = $this->obtenerColumna($filaConsulta, 'id_turno');
        $this->cantidadAula = $this->obtenerColumna($filaConsulta, 'cantidad_aula');
        $this->vacantesAula = $this->obtenerColumna($filaConsulta, 'vacantes_aula');
        $this->fechaRegistroAula = $this->obtenerColumna($filaConsulta, 'fecha_registro_aula');
        
        $this->programa = $this->obtenerColumna($filaConsulta, 'nombre_programa_academia');
        $this->sede = $this->obtenerColumna($filaConsulta, 'sede_nombre');
        $this->nivel = $this->obtenerColumna($filaConsulta, 'descripcion_nivelp');
        $this->turno = $this->obtenerColumna($filaConsulta, 'turno');
        $this->semanal = $this->obtenerColumna($filaConsulta, 'semanal_aula');
        $this->simulacro = $this->obtenerColumna($filaConsulta, 'simulacro_aula');
        $this->diario = $this->obtenerColumna($filaConsulta, 'diario_aula');
    }

    public function bindValues($statement)
    {
        $statement->bindValue(1, $this->idAula, PDO::PARAM_INT);
        $statement->bindValue(2, $this->idProgramasAcademia, PDO::PARAM_INT);
        $statement->bindValue(3, $this->idSede, PDO::PARAM_INT);
        $statement->bindValue(4, $this->idNivel, PDO::PARAM_INT);
        $statement->bindValue(5, $this->idTurno, PDO::PARAM_INT);
        $statement->bindValue(6, $this->cantidadAula, PDO::PARAM_INT);
        $statement->bindValue(7, $this->vacantesAula, PDO::PARAM_INT);
        $statement->bindValue(8, date("Y-m-d H:i:s", strtotime($this->fechaRegistroAula)), PDO::PARAM_STR);
        $statement->bindValue(9, $this->opcion, PDO::PARAM_INT);
        $statement->bindValue(10, $this->pagina, PDO::PARAM_INT);

        return $statement;
    }

    public function set($metodo)
    {
        $this->idAula = $metodo('idAula');
        $this->idProgramasAcademia = $metodo('idProgramasAcademia');
        $this->idSede = $metodo('idSede');
        $this->idNivel = $metodo('idNivel');
        $this->idTurno = $metodo('idTurno');
        $this->cantidadAula = $metodo('cantidadAula');
        $this->vacantesAula = $metodo('vacantesAula');
        $this->fechaRegistroAula = $metodo('fechaRegistroAula');
        $this->semanal= $metodo('semanal');
        $this->simulacro= $metodo('simulacro');
        $this->diario = $metodo('diario');
    }
}

?>
