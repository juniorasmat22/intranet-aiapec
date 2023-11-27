<?php
namespace entidades;
use PDO;
class ReporteAsistencia extends Entidad
{
	public $cantidad_asistencias;
	public $cantidad_faltas;
	public $cantidad_tardanza;
	public $cantidad_tj;
	public $cantidad_fj;
	public $total;
	public $porcentaje_asistencias;
    public $porcentaje_faltas;
    public $porcentaje_tardanzas;
	public $porcentaje_tj;
    public $porcentaje_fj;
	public $nombreEstudiante;
	public $nombrePrograma;
	public $idEstudiante;
    public $fechaInicio;
    public $fechaFin;
    	//variables para filtrar matriculas
	public $idProgramaAcademia;
	public $programaNivel;
	public $programaSede;
	//variables para filtrar matriculas

	public function setConsulta($filaConsulta){
		$this->cantidad_asistencias=$this->obtenerColumna($filaConsulta,'asistencias_a');
		$this->cantidad_faltas=$this->obtenerColumna($filaConsulta,'asistencias_f');
		$this->cantidad_tardanza=$this->obtenerColumna($filaConsulta,'asistencias_t');
		$this->cantidad_fj=$this->obtenerColumna($filaConsulta,'asistencias_fj');
		$this->cantidad_tj=$this->obtenerColumna($filaConsulta,'asistencias_tj');
        $this->total=$this->obtenerColumna($filaConsulta,'total_asistencias');
        $this->porcentaje_asistencias=$this->obtenerColumna($filaConsulta,'porcentaje_a');
        $this->porcentaje_faltas=$this->obtenerColumna($filaConsulta,'porcentaje_f');
        $this->porcentaje_tardanzas=$this->obtenerColumna($filaConsulta,'porcentaje_t');
        $this->porcentaje_fj=$this->obtenerColumna($filaConsulta,'porcentaje_fj');
		$this->porcentaje_tj=$this->obtenerColumna($filaConsulta,'porcentaje_tj');
        $this->nombreEstudiante=$this->obtenerColumna($filaConsulta,'numerodocumento_estudiante');
        $this->idEstudiante=$this->obtenerColumna($filaConsulta,'id_estudiante');
        $this->nombrePrograma=$this->obtenerColumna($filaConsulta,'nombre_programa_academia');
	}
	public function bindValues($statement){
		
		$statement->bindValue(1,date("Y-m-d", strtotime($this->fechaInicio)),PDO::PARAM_STR);
        $statement->bindValue(2,date("Y-m-d", strtotime($this->fechaFin)),PDO::PARAM_STR);
		$statement->bindValue(3,$this->idProgramaAcademia,PDO::PARAM_STR);
        $statement->bindValue(4,$this->programaNivel,PDO::PARAM_STR);
        $statement->bindValue(5,$this->programaSede,PDO::PARAM_STR);
        $statement->bindValue(6,$this->idEstudiante,PDO::PARAM_INT);
		$statement->bindValue(7,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(8,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->fechaInicio	            = $metodo('fechaIncio');
		$this->fechaFin                 = $metodo('fechaFin');
		$this->idProgramaAcademia		= $metodo('idProgramaAcademia');
		$this->programaNivel			= $metodo('programaNivel');
		$this->programaSede				= $metodo('programaSede');
		$this->nombreEstudiante			= $metodo('nombreEstudiante');
		$this->idEstudiante			= $metodo('idEstudiante');
		$this->cantidad_asistencias			= $metodo('cantidad_asistencias');
	}

}
