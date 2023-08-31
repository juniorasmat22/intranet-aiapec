<?php
namespace modelos;

class EstudianteModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_estudiante_crud(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)','Estudiante');
	}

	public function registro($estudiante){//REGISTRAR USUARIOS
		date_default_timezone_set("America/Lima");
		$fecha_actual=date("d-m-Y h:i:s");
		$edad = date_diff(date_create($estudiante->fechaNacimientoEstudiante), date_create(date("Y-m-d")));
		$estudiante->edadEstudiante = ($edad->format('%y') >0) ? $edad->format('%y') : 0 ;
		$estudiante->opcion=2;
		return $this->noQuery($this->sp,$estudiante);
	}
	
}
