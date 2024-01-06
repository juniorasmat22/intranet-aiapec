<?php
namespace controladores;

use entidades\Entidad;

class EvaluacionControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('EvaluacionModelo','Evaluacion','vistas/evaluacion/index.php');
	}

	public function index() {
		$pagina=isset($_GET['p'])?$_GET['p']:1;
		$aula= new AulaControlador();
        $aula->entidad->idAula=(int)$_SESSION['id_semestre_activo'];
        $respuesta=$aula->modelo->listarAulas($aula->entidad,$pagina);
		$vista='vistas/evaluacion/semanal.php';
		require_once 'vistas/plantilla/index.php';
	}
	public function lista() {
		$tipo=isset($_GET['t'])?$_GET['t']:1;
		$aula=isset($_GET['s'])?$_GET['s']:1;
		$this->entidad->tipoEvaluacion=$tipo;
		$this->entidad->idAula=(int)$aula;
		$respuesta=$this->modelo->listarEvaluaciones($this->entidad,1);
		$vista=$this->vista;
		require_once 'vistas/plantilla/index.php';
	}
}
