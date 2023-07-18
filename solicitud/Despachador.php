<?php

namespace solicitud;

use controladores;

class Despachador
{
	private $solicitud;
	public function __Construct()
	{
		$this->solicitud = Router::getSolicitud();
	}

	public function despachar()
	{
		$controlador = $this->cargarControlador();
	
		if (count($_SESSION) > 0) {

			if (method_exists($controlador, $this->solicitud->accion)) {
				$controlador->{$this->solicitud->accion}();
			} else {
				$controlador = new controladores\PlantillaControlador();
				$controlador->vista404();
			}
		} else {
			// [21] Crea objetos de UsuarioModelo - Usuario, y asigna una url para la vista
			$controlador = new controladores\UsuarioControlador();
			$controlador->login();
			//$controlador=new controladores\PlantillaControlador();
			//$controlador->login();
		}
	}

	private function cargarControlador()
	{
		$Controlador = 'controladores\\' . ucwords($this->solicitud->controlador) . 'Controlador';
		if (class_exists($Controlador)) {
			return new $Controlador();
		} else {
			$this->solicitud->accion = 'vista404';
			return new controladores\PlantillaControlador();
		}
	}
}
