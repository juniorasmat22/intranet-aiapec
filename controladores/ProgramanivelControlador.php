<?php
namespace controladores;

class ProgramanivelControlador extends Controlador
{

	public function __construct()
	{
			parent::__construct('ProgramanivelModelo','Programanivel','');
	}
	public function nivelesPorPrograma(){
		$this->entidad->setMetodoPost();
        $respuesta = $this->modelo->get_niveles_por_programa($this->entidad);
        return $this->respuesta($respuesta);
	}
	

}
