<?php
namespace controladores;

class AreaControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('AreaModelo','Area','vistas/nosotros/index.php');
	}
	
}
