<?php
namespace entidades;
use PDO;
class Estudianteescolar extends Entidad
{
	public $idEscolar;
	public $idEstudiante;
	public $idGrado;
	public $colegioEscolar;
	public $sedeColegio;
	public $seccionColegio;



	public function setConsulta($filaConsulta){
		$this->idEscolar=$this->obtenerColumna($filaConsulta,'id_escolar');
		$this->idEstudiante=$this->obtenerColumna($filaConsulta,'id_estudiante');
		$this->idGrado=$this->obtenerColumna($filaConsulta,'id_grado');
		$this->colegioEscolar=$this->obtenerColumna($filaConsulta,'colegio_escolar');
        $this->sedeColegio=$this->obtenerColumna($filaConsulta,'sede_colegio');
        $this->seccionColegio=$this->obtenerColumna($filaConsulta,'seccion_colegio');
	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->idEscolar,PDO::PARAM_INT);
		$statement->bindValue(2,$this->idEstudiante,PDO::PARAM_INT);
		$statement->bindValue(3,$this->idGrado,PDO::PARAM_INT);
		$statement->bindValue(4,$this->colegioEscolar,PDO::PARAM_STR);
		$statement->bindValue(5,$this->sedeColegio,PDO::PARAM_STR);
		$statement->bindValue(6,$this->seccionColegio,PDO::PARAM_STR);
		$statement->bindValue(7,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(8,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idEscolar	 		= $metodo('idEscolar');
		$this->idEstudiante     	= $metodo('idEstudiante');
		$this->idGrado	   			= $metodo('idGrado');
		$this->colegioEscolar 	    = $metodo('colegioEscolar');
		$this->sedeColegio 	       	= $metodo('sedeColegio');
		$this->seccionColegio 	    = $metodo('seccionColegio');
	}

}
