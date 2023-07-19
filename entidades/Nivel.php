<?php
namespace entidades;
use PDO;
class Nivel extends Entidad
{
	public $idNivel;
	public $descripcionNivel;



	public function setConsulta($filaConsulta){
		$this->idNivel=$this->obtenerColumna($filaConsulta,'id_nivel');
		$this->descripcionNivel=$this->obtenerColumna($filaConsulta,'nivel_descripcion');
		
	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->idNivel,PDO::PARAM_INT);
		$statement->bindValue(2,$this->descripcionNivel,PDO::PARAM_STR);
		$statement->bindValue(3,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(4,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idNivel	 = $metodo('idNivel');
		$this->descripcionNivel      = $metodo('descripcionNivel');
	}

}
