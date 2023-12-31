<?php

namespace controladores;

class ProgramasedeControlador extends Controlador
{
	public function __construct()
	{
		parent::__construct('ProgramasedeModelo','Programasede','');
	}

	public function sedesPorPrograma(){
		$this->entidad->setMetodoPost();
        $respuesta = $this->modelo->get_sede_por_programa($this->entidad);
        return $this->respuesta($respuesta);
	}
}
