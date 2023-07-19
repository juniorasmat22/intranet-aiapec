<?php

namespace entidades;

use PDO;

class Grado extends Entidad
{
	public $idGrado;
	public $descripcionGrado;
	public $idNivel;



	public function setConsulta($filaConsulta)
	{
		$this->idGrado = $this->obtenerColumna($filaConsulta, 'id_grado');
		$this->descripcionGrado = $this->obtenerColumna($filaConsulta, 'descripcion_grado');
		$this->idNivel = $this->obtenerColumna($filaConsulta, 'id_nivel');
			
    }
	public function bindValues($statement)
	{
		$statement->bindValue(1, $this->idGrado, PDO::PARAM_INT);
		$statement->bindValue(2, $this->descripcionGrado, PDO::PARAM_STR);
		$statement->bindValue(3, $this->idNivel, PDO::PARAM_INT);
		$statement->bindValue(4, $this->opcion, PDO::PARAM_INT);
		$statement->bindValue(5, $this->pagina, PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo)
	{
		$this->idGrado	 = $metodo('idGrado');
		$this->descripcionGrado      = $metodo('descripcionGrado');
		$this->idNivel	   = $metodo('idNivel');
		
    }
}
