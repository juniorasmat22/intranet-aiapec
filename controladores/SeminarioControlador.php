<?php
namespace controladores;

use entidades\Matriculaseminario;

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
		$matricula=new MatriculaseminarioControlador();
		$matricula->entidad->idSeminario=$this->entidad->idSeminario;
		$matricula->entidad->idEstudiante=$_SESSION['idEstudiante'];
		$validar_matricula=$matricula->modelo->get_matricula_por_seminario_estudiante($matricula->entidad);
		require 'vistas/plantilla/index.php';
	}
	
}
