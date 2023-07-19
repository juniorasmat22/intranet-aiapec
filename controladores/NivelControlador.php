<?php
namespace controladores;

class NivelControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('NivelModelo','Nivel','vistas/nivel/index.php');
	}
	
}
