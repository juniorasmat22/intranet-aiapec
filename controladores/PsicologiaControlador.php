<?php
namespace controladores;

class PsicologiaControlador extends Controlador
{

	public function __construct()
	{
			parent::__construct('PsicologiaModelo','Psicologia','vistas/psicologia/index.php');
	}
    public function index()  {
        $vista = $this->vista;
        $this->entidad->idEstudiante=$_SESSION['idEstudiante'];
        $respuesta=$this->modelo->obtenerInformesXalumno($this->entidad);
		require 'vistas/plantilla/index.php';
    }

    public function informe()  {
        $this->entidad->setMetodoPost();
        $this->entidad->idEstudiante=$_SESSION['idEstudiante'];
        $respuesta=$this->modelo->get($this->entidad);
        $vista = 'vistas/psicologia/mi_informe.php';
		require 'vistas/plantilla/index.php';
        
    }
    
}
