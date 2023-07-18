<?php
namespace controladores;

class PlantillaControlador extends Controlador
{

	public function __construct()
	{
			parent::__construct('','','vistas/dashboard/index.php');
	}
	public function index(){
		$vista = $this->vista;
		require 'vistas/plantilla/index.php';

	}
	public function vista404(){
		require 'vistas/plantilla/404.php';
	}

}
