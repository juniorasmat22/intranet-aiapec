<?php
namespace entidades;
use PDO;
class Programasede extends Entidad
{
	public $idProgramaSede;
    public $idProgramasAcademia;
	public $idSede;
	

	public function setConsulta($filaConsulta){
		$this->idProgramaSede=$this->obtenerColumna($filaConsulta,'id_programa_sede');
		$this->idProgramasAcademia=$this->obtenerColumna($filaConsulta,'id_programas_academia');
		$this->idSede=$this->obtenerColumna($filaConsulta,'id_sede');
			
    }
	
	public function bindValues($statement){
		$statement->bindValue(1,$this->idProgramaSede,PDO::PARAM_INT);
		$statement->bindValue(2,$this->idProgramasAcademia,PDO::PARAM_INT);
		$statement->bindValue(3,$this->idSede,PDO::PARAM_STR);
		$statement->bindValue(4,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(5,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idProgramaSede	        = $metodo('idProgramaSede');
		$this->idProgramasAcademia      = $metodo('idProgramasAcademia');
		$this->idSede        = $metodo('idSede');
	}
}
