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

    public function misConcursos()
	{
		$vista = $this->vista = 'vistas/registroconcurso/registroconcurso.php';
		$this->entidad->idEstudiante = $_SESSION['idEstudiante'];
		$respuesta = $this->modelo->get_concursos_por_estudiante($this->entidad);
		require 'vistas/plantilla/index.php';
	}
    public function ficha(){
        $id_ficha=isset($_GET['idFicha'])?$_GET['idFicha']:null;
        $this->entidad->idRegistroConcurso=$id_ficha;
        $respuesta = $this->modelo->get($this->entidad);
        //datos del estudiante
        $estudiante= new EstudianteControlador();
        $estudiante->entidad->idEstudiante= $respuesta ->resultado->idEstudiante;
        $mi_estudiante=$estudiante->modelo->getEstudiante($estudiante->entidad); 
        //datos del concurso
        $concurso= new ConcursoControlador();
        $concurso->entidad->idConcurso=$respuesta ->resultado->idConcurso;
        $mi_concurso=$concurso->modelo->get($concurso->entidad);
        $est_escolar=new EstudianteescolarControlador();
        $est_escolar->entidad->idEstudiante= $respuesta ->resultado->idEstudiante;
        $mi_estudiante_escolar=$est_escolar->modelo->get_estudiante_escolar( $est_escolar->entidad);

        //GRADO
        $grado=new GradoControlador();
        $grado->entidad->idGrado= $mi_estudiante_escolar->resultado->idGrado;
        $mi_grado=$grado->modelo->get($grado->entidad);

        //nivel
        $nivel=new NivelControlador();
        $nivel->entidad->idNivel= $mi_grado->resultado->idNivel;
        $mi_nivel= $nivel->modelo->get($nivel->entidad);
        require_once "vistas/registroconcurso/ficha.php";
    }
		
}
