<?php

namespace controladores;

class ReporteAsistenciaControlador extends Controlador
{
	public function __construct()
	{
		parent::__construct('ReporteAsistenciaModelo','ReporteAsistencia','vistas/reporte/asistencia/resumen/index.php');
	}
	
	public function resumen(){
		$vista = $this->vista = 'vistas/estudiante/perfil.php';
		require 'vistas/plantilla/index.php';
	}
}
