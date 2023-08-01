<?php
namespace entidades;
use PDO;
class Costo extends Entidad
{
	public $idCosto;
	public $nombreCosto;
	public $tipoCosto;
	public $estadoCosto;



	public function setConsulta($filaConsulta){
		$this->idCosto=$this->obtenerColumna($filaConsulta,'id_costo');
		$this->nombreCosto=$this->obtenerColumna($filaConsulta,'nombre_costo');
		$this->tipoCosto=$this->obtenerColumna($filaConsulta,'tipo_costo');
		$this->estadoCosto=$this->obtenerColumna($filaConsulta,'estado_costo');
		
	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->idCosto,PDO::PARAM_INT);
		$statement->bindValue(2,$this->nombreCosto,PDO::PARAM_STR);
		$statement->bindValue(3,$this->tipoCosto,PDO::PARAM_STR);
		$statement->bindValue(4,$this->estadoCosto,PDO::PARAM_STR);
		$statement->bindValue(5,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(6,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idCosto	        = $metodo('idCosto');
		$this->nombreCosto      = $metodo('nombreCosto');
		$this->tipoCosto	    = $metodo('tipoCosto');
		$this->estadoCosto 	    = $metodo('estadoCosto');
	}

}
