<?php
namespace entidades;
use PDO;
class Temaseminario extends Entidad
{
	public $idTemaSeminario;
	public $nroTemaSeminario;
    public $nombreTemaSeminario;
    public $idCursoSeminario;



	public function setConsulta($filaConsulta){
		$this->idTemaSeminario=$this->obtenerColumna($filaConsulta,'id_tema_seminario');
		$this->nroTemaSeminario=$this->obtenerColumna($filaConsulta,'nro_tema_seminario');
		$this->nombreTemaSeminario=$this->obtenerColumna($filaConsulta,'nombre_tema_seminario');
		$this->idCursoSeminario=$this->obtenerColumna($filaConsulta,'id_curso_seminario');
	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->idTemaSeminario,PDO::PARAM_INT);
		$statement->bindValue(2,$this->nroTemaSeminario, PDO::PARAM_STR);
        $statement->bindValue(3,$this->nombreTemaSeminario,PDO::PARAM_STR);
		$statement->bindValue(4,$this->idCursoSeminario,PDO::PARAM_INT);
		$statement->bindValue(5,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(6,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idTemaSeminario	 = $metodo('idTemaSeminario');
		$this->nroTemaSeminario      = $metodo('nroTemaSeminario');
		$this->nombreTemaSeminario      = $metodo('nombreTemaSeminario');
		$this->idCursoSeminario      = $metodo('idCursoSeminario');
	}

}
