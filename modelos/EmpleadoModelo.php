<?php
namespace modelos;

class EmpleadoModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_empleado_crud(?,?,?,?,?,?,?,?)','Empleado');
	}
	public function listarEmpleados($empleado){//lista empledos que no tienen un usuario asignado
		$empleado->opcion = 6;
		return $this->queryObjects($this->sp,$empleado);
	}
}
