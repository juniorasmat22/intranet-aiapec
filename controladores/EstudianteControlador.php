<?php

namespace controladores;


class EstudianteControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('EstudianteModelo', 'Estudiante', 'vistas/estudiante/index.php');
	}
	public function index()
	{
		$vista = $this->vista;
		require 'vistas/plantilla/index.php';
	}
	public function vista404()
	{
		require 'vistas/plantilla/404.php';
	}
	public function updated()
	{
		
		$this->entidad->numerodocumentoEstudiante=$_SESSION['useranem'];
		$estudiante = $this->modelo->get($this->entidad);
		$vista=$this->vista='vistas/estudiante/actualizar.php';
		require 'vistas/plantilla/index.php';
	}
	public function registrar()
	{

		$this->entidad->setMetodoPost();
		$respuesta1 = $this->modelo->get($this->entidad);
		if (!$respuesta1->respuesta) {
			$respuesta = $this->modelo->registro($this->entidad);
			$this->respuesta($respuesta);
		} else {
			$respuesta1->respuesta = false;
			$respuesta1->mensaje = "El dni " . $respuesta1->resultado->dniEstudiante . " ya se encuentra registrado, por favor iniciar sesion";
			$this->respuesta($respuesta1);
		}
	}
}
