<?php
namespace entidades;
use PDO;
class Estudiantepre extends Entidad
{
	public $idPre;
	public $idCarrera;
	public $idEstudiante;
	public $modalidadEstudiante;



	public function setConsulta($filaConsulta){
		$this->idPre=$this->obtenerColumna($filaConsulta,'id_pre');
		$this->idCarrera=$this->obtenerColumna($filaConsulta,'id_carrera');
		$this->idEstudiante=$this->obtenerColumna($filaConsulta,'id_estudiante');
		$this->modalidadEstudiante=$this->obtenerColumna($filaConsulta,'modalidad_estudiante');

	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->idPre,PDO::PARAM_INT);
		$statement->bindValue(2,$this->idCarrera,PDO::PARAM_INT);
		$statement->bindValue(3,$this->idEstudiante,PDO::PARAM_INT);
		$statement->bindValue(4,$this->modalidadEstudiante,PDO::PARAM_STR);
		$statement->bindValue(5,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(6,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idPre	 = $metodo('idPre');
		$this->idCarrera      = $metodo('idCarrera');
		$this->idEstudiante	   = $metodo('idEstudiante');
		$this->modalidadEstudiante 	       = $metodo('modalidadEstudiante');
	}

}
