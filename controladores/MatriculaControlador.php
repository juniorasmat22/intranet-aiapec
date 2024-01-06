<?php
namespace controladores;

class MatriculaControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('MatriculaModelo','Matricula','vistas/matricula/index.php');
	}
	public function registro(){
		$semestre= new SemestreControlador();
		$semestre_activo=$semestre->modelo->get_semestre_activo($semestre->entidad);
		$programas=new ProgramasacademiaControlador();
		$programas->entidad->idSemestre=$semestre_activo->resultado->idSemestre;
		$lista_programas=$programas->modelo->get_programas_por_semestre($programas->entidad);
		
		$vista = 'vistas/matricula/crear.php';
		require 'vistas/plantilla/index.php';
	}

	public function matriculas() {
		$this->entidad->idEstudiante=(int)$_SESSION['idEstudiante'];
		$mis_matriculas=$this->modelo->get_matriculas_por_estudiante($this->entidad);
		
		$vista = 'vistas/matricula/index.php';
		require 'vistas/plantilla/index.php';
	}
	
}
