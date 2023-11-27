<?php
namespace entidades;
use PDO;
class Asistencia extends Entidad
{
	public $idAsistencia;
	public $turnoAsistencia;
	public $fechaAsistencia;
	public $estadoAsistencia;
	public $observacionAsistencia;
	public $tipoAsistencia;
    public $idEstudiante;
    public $idMatricula;
	public $nombreEstudiante;
	public $dniEstudiante;
	//variables para filtrar matriculas
	public $idProgramaAcademia;
	public $programaNivel;
	public $programaSede;
	//variables para filtrar matriculas

	//variables para reportes colegio
	public $nombrePrograma;
	public $grado;
	public $seccion;
	public $sede;



	public function setConsulta($filaConsulta){
		$this->idAsistencia=$this->obtenerColumna($filaConsulta,'id_asistencia');
		$this->turnoAsistencia=$this->obtenerColumna($filaConsulta,'turno_asistencia');
		$this->fechaAsistencia=$this->obtenerColumna($filaConsulta,'fecha_asistencia');
		$this->estadoAsistencia=$this->obtenerColumna($filaConsulta,'estado_asistencia');
        $this->observacionAsistencia=$this->obtenerColumna($filaConsulta,'observacion_asistencia');
        $this->tipoAsistencia=$this->obtenerColumna($filaConsulta,'tipo');
        $this->idEstudiante=$this->obtenerColumna($filaConsulta,'id_estudiante');
        $this->idMatricula=$this->obtenerColumna($filaConsulta,'id_matricula');
        $this->nombreEstudiante=$this->obtenerColumna($filaConsulta,'nombre_estudiante');
        $this->dniEstudiante=$this->obtenerColumna($filaConsulta,'numerodocumento_estudiante');
		
        $this->nombrePrograma=$this->obtenerColumna($filaConsulta,'nombre_programa_academia');
        $this->grado=$this->obtenerColumna($filaConsulta,'descripcion_grado');
        $this->seccion=$this->obtenerColumna($filaConsulta,'seccion_colegio');
        $this->sede=$this->obtenerColumna($filaConsulta,'sede_nombre');

	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->idAsistencia,PDO::PARAM_STR);
		$statement->bindValue(2,$this->turnoAsistencia,PDO::PARAM_STR);
		$statement->bindValue(3,date("Y-m-d H:i:s", strtotime($this->fechaAsistencia)),PDO::PARAM_STR);
		$statement->bindValue(4,$this->estadoAsistencia,PDO::PARAM_STR);
        $statement->bindValue(5,$this->observacionAsistencia,PDO::PARAM_STR);
        $statement->bindValue(6,$this->tipoAsistencia,PDO::PARAM_STR);
        $statement->bindValue(7,$this->idEstudiante,PDO::PARAM_INT);
        $statement->bindValue(8,$this->idMatricula,PDO::PARAM_INT);
        $statement->bindValue(9,$this->idProgramaAcademia,PDO::PARAM_INT);
        $statement->bindValue(10,$this->programaNivel,PDO::PARAM_INT);
        $statement->bindValue(11,$this->programaSede,PDO::PARAM_INT);
		$statement->bindValue(12,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(13,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idAsistencia	            = $metodo('idAsistencia');
		$this->turnoAsistencia          = $metodo('turnoAsistencia');
		$this->fechaAsistencia	        = $metodo('fechaAsistencia');
		$this->estadoAsistencia 	    = $metodo('estadoAsistencia');
		$this->observacionAsistencia 	= $metodo('observacionAsistencia');
		$this->tipoAsistencia 	        = $metodo('tipoAsistencia');
		$this->idEstudiante 	        = $metodo('idEstudiante');
		$this->idMatricula 	            = $metodo('idMatricula');
		$this->idProgramaAcademia		= $metodo('idProgramaAcademia');
		$this->programaNivel			= $metodo('programaNivel');
		$this->programaSede				= $metodo('programaSede');
		$this->nombreEstudiante			= $metodo('nombreEstudiante');
		$this->nombrePrograma			= $metodo('nombrePrograma');
		$this->grado				= $metodo('grado');
		$this->seccion			= $metodo('seccion');
		$this->sede			= $metodo('sede');
	}

}
