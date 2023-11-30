<?php
namespace controladores;

use entidades\Matricula;
use entidades\ReporteAsistencia;
use Exception;
use nucleo\Respuesta;

class AsistenciaControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('AsistenciaModelo','Asistencia','vistas/asistencia/index.php');
	}
	
	public function index(){
		$reporteAsistencia= new ReporteAsistenciaControlador();
		$reporteAsistencia->entidad->setMetodoGet();
		$reporteAsistencia->entidad->fechaInicio= (isset($reporteAsistencia->entidad->fechaInicio) && !($reporteAsistencia->entidad->fechaInicio==date('Y-m-d')) )?$reporteAsistencia->entidad->fechaInicio:'2023-08-08';//2023-10-23';
		$reporteAsistencia->entidad->fechaFin=isset($reporteAsistencia->entidad->fechaFin)?$reporteAsistencia->entidad->fechaFin:date('Y-m-d');
		$reporteAsistencia->entidad->idEstudiante=$_SESSION['idEstudiante'];
		$mi_reporte= $reporteAsistencia->modelo->obtenerDatosAsistencia($reporteAsistencia->entidad);
		$this->entidad->fechaAsistencia=$reporteAsistencia->entidad->fechaInicio;
		$this->entidad->observacionAsistencia=$reporteAsistencia->entidad->fechaFin;
		$this->entidad->idEstudiante=$_SESSION['idEstudiante'];
		$mi_asistencia=$this->modelo->obtenerAsistencia($this->entidad);
		$vista=$this->vista;
		require_once 'vistas/plantilla/index.php';
	}
	
	
}