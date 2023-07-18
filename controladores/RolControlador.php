<?php

namespace controladores;

class RolControlador extends Controlador
{
	public function __construct()
	{
		parent::__construct('RolModelo','Rol','vistas/rol/index.php');
	}
}
