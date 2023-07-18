<?php
namespace modelos;

class EstudianteModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_estudiante_crud(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)','Estudiante');
	}

	public function registro($registroseminario){//REGISTRAR USUARIOS
		date_default_timezone_set("America/Lima");
		$fecha_actual=date("d-m-Y h:i:s");
		$edad = date_diff(date_create($registroseminario->fechaNacimientoEstudiante), date_create(date("Y-m-d")));
		$registroseminario->edadEstudiante = ($edad->format('%y') >0) ? $edad->format('%y') : 0 ;
		$registroseminario->opcion=6;
		$registroseminario->fechaRegistroEstudiante=$fecha_actual;
		$registroseminario->fechaMatSeminario=$fecha_actual;
		return $this->noQuery($this->sp,$registroseminario);
	}
	
}
