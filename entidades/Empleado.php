<?php

namespace entidades;

use PDO;

class Empleado extends Entidad
{
	public $emp_id;
	public $emp_nombres;
	public $emp_apellidos;
	public $emp_direccion;
	public $emp_telefono;
	public $emp_estado;



	public function setConsulta($filaConsulta)
	{

		$this->emp_id = $this->obtenerColumna($filaConsulta, 'emp_id');
		$this->emp_nombres = $this->obtenerColumna($filaConsulta, 'emp_nombres');
		$this->emp_apellidos = $this->obtenerColumna($filaConsulta, 'emp_apellidos');
		$this->emp_direccion = $this->obtenerColumna($filaConsulta, 'emp_direccion');
		$this->emp_telefono = $this->obtenerColumna($filaConsulta, 'emp_telefono');
		$this->emp_estado = $this->obtenerColumna($filaConsulta, 'emp_estado');
	}
	public function bindValues($statement)
	{
		$statement->bindValue(1, $this->emp_id, PDO::PARAM_INT);
		$statement->bindValue(2, $this->emp_nombres, PDO::PARAM_STR);
		$statement->bindValue(3, $this->emp_apellidos, PDO::PARAM_STR);
		$statement->bindValue(4, $this->emp_direccion, PDO::PARAM_STR);
		$statement->bindValue(5, $this->emp_telefono, PDO::PARAM_STR);
		$statement->bindValue(6, $this->emp_estado, PDO::PARAM_INT);
		$statement->bindValue(7, $this->opcion, PDO::PARAM_INT);
		$statement->bindValue(8, $this->pagina, PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo)
	{

		$this->emp_id = $metodo('emp_id');
		$this->emp_nombres = $metodo('emp_nombres');
		$this->emp_apellidos = $metodo('emp_apellidos');
		$this->emp_direccion = $metodo('emp_direccion');
		$this->emp_telefono = $metodo('emp_telefono');
		$this->emp_estado = $metodo('emp_estado');
	}
}
