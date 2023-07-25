<?php
namespace controladores;

class SeminarioControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('SeminarioModelo','Seminario','vistas/seminario/index.php');
	}
	
	
	public function detalleseminario(){
		$vista = $this->vista='vistas/seminario/detalleSeminario.php';
		$this->entidad->idSeminario=isset($_GET['idSeminario'])?$_GET['idSeminario']:null;
		$respuesta=$this->modelo->get($this->entidad);
		require 'vistas/plantilla/index.php';
	}
	
}
