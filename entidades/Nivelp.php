<?php
namespace entidades;
use PDO;
class Nivelp extends Entidad
{
	public $idNivelp;
	public $descripcionNivelp;



	public function setConsulta($filaConsulta){
		$this->idNivelp=$this->obtenerColumna($filaConsulta,'id_nivelp');
		$this->descripcionNivelp=$this->obtenerColumna($filaConsulta,'descripcion_nivelp');
		
	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->idNivelp,PDO::PARAM_INT);
		$statement->bindValue(2,$this->descripcionNivelp,PDO::PARAM_STR);
		$statement->bindValue(3,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(4,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idNivelp	 = $metodo('idNivelp');
		$this->descripcionNivelp      = $metodo('descripcionNivelp');
	}

}
