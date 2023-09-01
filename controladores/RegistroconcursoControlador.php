<?php
namespace controladores;

use EmailSender;
use entidades\Estudiante;

class RegistroconcursoControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('RegistroconcursoModelo','Registroconcurso','vistas/registroconcurso/index.php');
	}

    public function index()
    {
        $id_concurso=isset($_GET['idConcurso'])?$_GET['idConcurso']:null;
        $this->entidad->idConcurso=$id_concurso;
        $respuesta = $this->modelo->get_estudiantes_por_concurso($this->entidad);
		$vista = $this->vista ;
		require 'vistas/plantilla/index.php';
    }
    public function ver()  {
        $id_registro=isset($_GET['idRegistro'])?$_GET['idRegistro']:null;
        $this->entidad->idRegistroConcurso=$id_registro;
        $respuesta = $this->modelo->get($this->entidad);
        $estudiante= new EstudianteControlador();
        $estudiante->entidad->idEstudiante= $respuesta ->resultado->idEstudiante;
        $mi_estudiante=$estudiante->modelo->getEstudiante($estudiante->entidad); 
        $vista = 'vistas/registroconcurso/ver.php ';
		require 'vistas/plantilla/index.php';
        
    }
    public function actualizarEstado() {
        $this->entidad->setMetodoPost();
        $respuesta = $this->modelo->update_estado($this->entidad);
        return $this->respuesta($respuesta);


        
    }
		
}
