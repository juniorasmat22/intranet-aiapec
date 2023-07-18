<?php
namespace entidades;
use PDO;
class Area extends Entidad
{
	public $idArea;
	public $nombreArea;
	public $descripcionArea;
	public $fechaRegistroArea;



	public function setConsulta($filaConsulta){
		$this->idArea=$this->obtenerColumna($filaConsulta,'id_area');
		$this->nombreArea=$this->obtenerColumna($filaConsulta,'nombre_area');
		$this->descripcionArea=$this->obtenerColumna($filaConsulta,'descripcion_area');
		$this->fechaRegistroArea=$this->obtenerColumna($filaConsulta,'fecha_registro_area');

	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->idArea,PDO::PARAM_INT);
		$statement->bindValue(2,$this->nombreArea,PDO::PARAM_STR);
		$statement->bindValue(3,$this->descripcionArea,PDO::PARAM_STR);
		$statement->bindValue(4,date("Y-m-d H:i:s", strtotime($this->fechaRegistroArea)),PDO::PARAM_STR);
		$statement->bindValue(5,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(6,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idArea	 = $metodo('idArea');
		$this->nombreArea      = $metodo('nombreArea');
		$this->descripcionArea	   = $metodo('descripcionArea');
		$this->fechaRegistroArea 	       = $metodo('fechaRegistroArea');
	}

}
