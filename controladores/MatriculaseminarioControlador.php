<?php

namespace controladores;

class MatriculaseminarioControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('MatriculaseminarioModelo', 'Matriculaseminario', '');
	}

	public function matricula()
	{
		$archivo = file_get_contents($_FILES["recibos"]["tmp_name"]);
		$this->entidad->setMetodoPost();
		$this->entidad->estado = 1;
		$this->entidad->recibo=$archivo;
		$respuesta = $this->modelo->crear($this->entidad);
		$this->respuesta($respuesta);
	}

	public function misSeminarios()
	{

		$vista = $this->vista = 'vistas/matriculaseminario/misSeminarios.php';
		$this->entidad->idEstudiante = $_SESSION['idEstudiante'];
		$respuesta = $this->modelo->get_matricula_seminario_por_estudiante($this->entidad);
		require 'vistas/plantilla/index.php';
	}
}
