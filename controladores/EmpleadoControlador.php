<?php

namespace controladores;

class EmpleadoControlador extends Controlador
{
	public function __construct()
	{
		parent::__construct('EmpleadoModelo','Empleado','vistas/empleado/index.php');
	}
}
