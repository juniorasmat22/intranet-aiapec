<?php

namespace controladores;

use entidades\Estudiantepre;

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

		$this->entidad->numerodocumentoEstudiante = $_SESSION['useranem'];
		$estudiante = $this->modelo->get($this->entidad);
		$vista = $this->vista = 'vistas/estudiante/actualizar.php';
		require 'vistas/plantilla/index.php';
	}
	public function miPerfil(){
		$this->entidad->numerodocumentoEstudiante = $_SESSION['useranem'];
		$estudiante = $this->modelo->get($this->entidad);
		$vista = $this->vista = 'vistas/estudiante/perfil.php';
		require 'vistas/plantilla/index.php';
	}
	public function actualizar()
	{

		$this->entidad->setMetodoPost();
		$this->entidad->datosUpdated=1;
		$this->entidad->estadoEstudiante=1;
		$this->entidad->tipoEstudiante= ($this->entidad->colegioEscolar=="AIAPAEC") ? 1 : 2 ; 
		$respuesta2 = $this->modelo->registro($this->entidad);
		//validamos si el usuario ha sido registrado, si todo fue bien
		if ($respuesta2->respuesta) {
			//si es egresado
			if ($this->entidad->situacionEstudiante == "Egresado de Secundaria") {
				$estudiantepre = new EstudiantepreControlador();
				$estudiantepre->entidad->modalidadEstudiante=$this->entidad->modalidadEstudiante;
				$estudiantepre->entidad->idEstudiante=$this->entidad->idEstudiante;
				$estudiantepre->entidad->idCarrera=$this->entidad->idCarrera;
				$respuesta3 = $estudiantepre->modelo->crear($estudiantepre->entidad);
				//validamos si la el estudiante pre se registro corectamente
				if ($respuesta3->respuesta) {
					$_SESSION['update'] =1;
					$this->respuesta($respuesta3);
					
				} else {
					$respuesta3->respuesta = false;
					$respuesta3->mensaje = "Ocurrio un error al registrar al egresado";
					$this->respuesta($respuesta3);
				}
			}
			//si es estudiante escolar
			else {
				$estudianteescolar = new EstudianteescolarControlador();
				$estudianteescolar->entidad->setMetodoPost();
				$respuesta4 = $estudianteescolar->modelo->crear($estudianteescolar->entidad);
				if ($respuesta4->respuesta) {
					$_SESSION['update'] =1;
					$this->respuesta($respuesta4);
				} else {
					$respuesta4->respuesta = false;
					$respuesta4->mensaje = " Ocurrio un error al registrar al escolar";
					$this->respuesta($respuesta4);
				}
			}
		}
		//en caso ocuurio algun error al registrar al usuario
		else {
			$respuesta2->respuesta = false;
			$respuesta2->mensaje = "Ocurrio al actualizar los datos  " ;
			$this->respuesta($respuesta2);
		}
	}
}
