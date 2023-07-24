<?php
namespace controladores;

class CursoControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('CursoModelo','Curso','');
	}
	
	public function vista404(){
		require 'vistas/plantilla/404.php';
	}
	
}
