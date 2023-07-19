<?php
namespace controladores;

class GradoControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('GradoModelo','Grado','vistas/grado/index.php');
	}
	public function gradosxnivel(){
		$this->entidad->setMetodoPost();
        $respuesta = $this->modelo->get_grados_por_nivel($this->entidad);
        return $this->respuesta($respuesta);
	}
}
