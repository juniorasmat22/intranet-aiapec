<?php
namespace controladores;

class ConcursoControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('ConcursoModelo','Concurso','vistas/concurso/index.php');
	}
	
 
    public function detalle(){
        $id_concurso=isset($_GET['id'])?$_GET['id']:null;
        $this->entidad->idConcurso=$id_concurso;
        $resultado=$this->modelo->get($this->entidad);
        $vista = 'vistas/concurso/registro.php';
		require 'vistas/plantilla/index.php';
    }

}