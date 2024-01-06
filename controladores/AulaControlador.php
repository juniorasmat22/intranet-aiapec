<?php

namespace controladores;

class AulaControlador extends Controlador {

    public function __construct() {
        parent::__construct('AulaModelo', 'Aula', 'vistas/aula/index.php');
    }
    public function index(){
        $matricula= new MatriculaControlador();
        $matricula->entidad->idEstudiante=(int)$_SESSION['idEstudiante'];
		$mis_matriculas=$matricula->modelo->get_matriculas_por_estudiante($matricula->entidad);
        $vista=$this->vista;
		require_once 'vistas/plantilla/index.php';
    }
}

?>
