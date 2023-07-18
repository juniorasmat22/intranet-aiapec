<?php

namespace entidades;

use PDO;

class Carrera extends Entidad
{
	public $idCarrera;
	public $nombreCarrera;
	public $idArea;
	public $fechaRegistroCarrera;



	public function setConsulta($filaConsulta)
	{
		$this->idCarrera = $this->obtenerColumna($filaConsulta, 'id_carrera');
		$this->nombreCarrera = $this->obtenerColumna($filaConsulta, 'nombre_carrera');
		$this->idArea = $this->obtenerColumna($filaConsulta, 'id_area');
		$this->fechaRegistroCarrera = $this->obtenerColumna($filaConsulta, 'fecha_registro_carrera');
	}
	public function bindValues($statement)
	{
		$statement->bindValue(1, $this->idCarrera, PDO::PARAM_INT);
		$statement->bindValue(2, $this->nombreCarrera, PDO::PARAM_STR);
		$statement->bindValue(3, $this->idArea, PDO::PARAM_INT);
		$statement->bindValue(4, date("Y-m-d H:i:s", strtotime($this->fechaRegistroCarrera)), PDO::PARAM_STR);
		$statement->bindValue(5, $this->opcion, PDO::PARAM_INT);
		$statement->bindValue(6, $this->pagina, PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo)
	{
		$this->idCarrera	 = $metodo('idCarrera');
		$this->nombreCarrera      = $metodo('nombreCarrera');
		$this->idArea	   = $metodo('idArea');
		$this->fechaRegistroCarrera 	       = $metodo('fechaRegistroCarrera');
	}
}
