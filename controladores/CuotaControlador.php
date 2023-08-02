<?php
namespace controladores;

class CuotaControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('CuotaModelo','Cuota','vistas/cuota/index.php');
	}
	
	
}
