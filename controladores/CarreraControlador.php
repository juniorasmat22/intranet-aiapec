<?php
namespace controladores;

class CarreraControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('CarreraModelo','Carrera','vistas/nosotros/index.php');
	}
	
	public function carrerasxarea(){
		$this->entidad->setMetodoPost();
        $respuesta = $this->modelo->get_carreras_por_area($this->entidad);
        return $this->respuesta($respuesta);
	}
}
