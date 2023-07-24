<?php
namespace entidades;
use PDO;
class Curso extends Entidad
{
	public $idCurso;
	public $nombreCurso;
    public $descripcionCurso;



	public function setConsulta($filaConsulta){
		$this->idCurso=$this->obtenerColumna($filaConsulta,'id_curso');
		$this->nombreCurso=$this->obtenerColumna($filaConsulta,'nombre_curso');
		$this->descripcionCurso=$this->obtenerColumna($filaConsulta,'descripcion_curso');
		
	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->idCurso,PDO::PARAM_INT);
		$statement->bindValue(2,$this->nombreCurso,PDO::PARAM_STR);
		$statement->bindValue(3,$this->descripcionCurso,PDO::PARAM_STR);
		$statement->bindValue(4,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(5,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idCurso	 = $metodo('idCurso');
		$this->nombreCurso      = $metodo('nombreCurso');
		$this->descripcionCurso      = $metodo('descripcionCurso');
	}

}
