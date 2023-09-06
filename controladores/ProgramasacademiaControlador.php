<?php

namespace controladores;

class ProgramasacademiaControlador extends Controlador
{
	public function __construct()
	{
		parent::__construct('ProgramasacademiaModelo','Programasacademia','');
	}
	public function preuniversitarios(){
		$this->entidad->tipoProgramasAcademia=1;
		$this->entidad->idSemestre=2;
		$programas_pre=$this->modelo->get_programas_por_tipo($this->entidad);

		$vista = 'vistas/programas/pre.php';
		require 'vistas/plantilla/index.php';
	}
	public function escolares(){
		$this->entidad->tipoProgramasAcademia=2;
		$this->entidad->idSemestre=2;
		$programas_escolares=$this->modelo->get_programas_por_tipo($this->entidad);
		$vista = 'vistas/programas/escolar.php';
		require 'vistas/plantilla/index.php';
	}
}
