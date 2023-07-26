<?php
namespace entidades;
use PDO;
class Programanivel extends Entidad
{
	public $idProgramaNivel;
	public $descripcionProgramaNivel;
	public $idProgramasAcademia;
	public $idNivelp;
	public $nombreNivel;

	public function setConsulta($filaConsulta){
		$this->idProgramaNivel=$this->obtenerColumna($filaConsulta,'id_programa_nivel');
		$this->descripcionProgramaNivel=$this->obtenerColumna($filaConsulta,'decripcion_programa_nivel');
		$this->idProgramasAcademia=$this->obtenerColumna($filaConsulta,'id_programas_academia');
		$this->idNivelp=$this->obtenerColumna($filaConsulta,'id_nivelp');
		$this->nombreNivel=$this->obtenerColumna($filaConsulta,'descripcion_nivelp');
	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->idProgramaNivel,PDO::PARAM_INT);
		$statement->bindValue(2,$this->descripcionProgramaNivel,PDO::PARAM_STR);
		$statement->bindValue(3,$this->idProgramasAcademia,PDO::PARAM_INT);
		$statement->bindValue(4,$this->idNivelp,PDO::PARAM_INT);
		$statement->bindValue(5,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(6,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idProgramaNivel	 = $metodo('idProgramaNivel');
		$this->descripcionProgramaNivel      = $metodo('descripcionProgramaNivel');
		$this->idProgramasAcademia      = $metodo('idProgramasAcademia');
		$this->idNivelp      = $metodo('idNivelp');
	}
}
