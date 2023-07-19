<?php

namespace entidades;

use PDO;

class Estudiante extends Entidad
{
	public $idEstudiante;
	public $tipodocumentoEstudiante;
	public $numerodocumentoEstudiante;
	public $apellidoEstudiante;
	public $nombresEstudiante;
	public $correoEstudiante;
	public $celularEstudiante;
	public $direccionEstudiante;
	public $nombreApoderadoEstudiante;
	public $apellidoApoderadoEstudiante;
	public $correoApoderadoEstudiante;
	public $celularApoderadoEstudiante;
	public $modalidadEstudiante;
	public $estadoEstudiante;
	public $idCarrera;
	public $idUsuario;
	public $fechaRegistroEstudiante;
	/*
	INICIO
	FECHA: 05/07/2023
	Agregando campos para estudiante pre y escolar
	*/
	public $dniApoderadoEstudiante;
	public $tipoEstudiante;
	public $fechaNacimientoEstudiante;
	public $edadEstudiante;
	public $idGrado;
	public $colegioEstudiante;
	public $situacionEstudiante;
	/*
	FIN
	FECHA: 05/07/2023
	Agregando campos para estudiante pre y escolar
	*/

	public $tycEstudiante;
	public $passEstudiante;
	public $sexoEstudiante;
	public $datosUpdated;
	public function setConsulta($filaConsulta)
	{
		$this->idEstudiante = $this->obtenerColumna($filaConsulta, 'id_estudiante');
		$this->tipodocumentoEstudiante = $this->obtenerColumna($filaConsulta, 'tipodocumento_estudiante');
		$this->numerodocumentoEstudiante = $this->obtenerColumna($filaConsulta, 'numerodocumento_estudiante');
		$this->apellidoEstudiante = $this->obtenerColumna($filaConsulta, 'apellidos_estudiante');
		$this->nombresEstudiante = $this->obtenerColumna($filaConsulta, 'nombres_estudiante');
		$this->correoEstudiante = $this->obtenerColumna($filaConsulta, 'correo_estudiante');
		$this->celularEstudiante = $this->obtenerColumna($filaConsulta, 'celular_estudiante');
		$this->direccionEstudiante = $this->obtenerColumna($filaConsulta, 'direccion_estudiante');
		$this->nombreApoderadoEstudiante = $this->obtenerColumna($filaConsulta, 'nombre_apoderado');
		$this->apellidoApoderadoEstudiante = $this->obtenerColumna($filaConsulta, 'apellido_apoderado');
		$this->correoApoderadoEstudiante = $this->obtenerColumna($filaConsulta, 'correo_apoderado');
		$this->celularApoderadoEstudiante = $this->obtenerColumna($filaConsulta, 'celular_apoderado');
		$this->modalidadEstudiante = $this->obtenerColumna($filaConsulta, 'modalidad_estudiante');
		$this->estadoEstudiante = $this->obtenerColumna($filaConsulta, 'estado_estudiante');
		$this->idCarrera = $this->obtenerColumna($filaConsulta, 'id_carrera');
		$this->idUsuario = $this->obtenerColumna($filaConsulta, 'id_usuario');
		$this->fechaRegistroEstudiante = $this->obtenerColumna($filaConsulta, 'fecha_registro_estudiante');
		$this->dniApoderadoEstudiante = $this->obtenerColumna($filaConsulta, 'dni_apoderado');
		$this->tipoEstudiante = $this->obtenerColumna($filaConsulta, 'tipo_estudiante');
		$this->fechaNacimientoEstudiante = $this->obtenerColumna($filaConsulta, 'fecha_nacimiento_estudiante');
		$this->edadEstudiante = $this->obtenerColumna($filaConsulta, 'edad_estudiante');
		$this->situacionEstudiante = $this->obtenerColumna($filaConsulta, 'situacion_estudiante');
		$this->tycEstudiante = $this->obtenerColumna($filaConsulta, 'tyc_estudiante');
		$this->sexoEstudiante = $this->obtenerColumna($filaConsulta, 'sexo_estudiante');
		$this->datosUpdated = $this->obtenerColumna($filaConsulta, 'datos_updated');
	
	}
	public function bindValues($statement)
	{
		$statement->bindValue(1, $this->idEstudiante, PDO::PARAM_INT);
		$statement->bindValue(2, $this->tipodocumentoEstudiante, PDO::PARAM_STR);
		$statement->bindValue(3, $this->numerodocumentoEstudiante, PDO::PARAM_STR);
		$statement->bindValue(4, $this->apellidoEstudiante, PDO::PARAM_STR);
		$statement->bindValue(5, $this->nombresEstudiante, PDO::PARAM_STR);
		$statement->bindValue(6, $this->correoEstudiante, PDO::PARAM_STR);
		$statement->bindValue(7, $this->celularEstudiante, PDO::PARAM_STR);
		$statement->bindValue(8, $this->direccionEstudiante, PDO::PARAM_STR);
		$statement->bindValue(9, $this->nombreApoderadoEstudiante, PDO::PARAM_STR);
		$statement->bindValue(10, $this->apellidoApoderadoEstudiante, PDO::PARAM_STR);
		$statement->bindValue(11, $this->correoApoderadoEstudiante, PDO::PARAM_STR);
		$statement->bindValue(12, $this->celularApoderadoEstudiante, PDO::PARAM_STR);
		$statement->bindValue(13, $this->modalidadEstudiante, PDO::PARAM_STR);
		$statement->bindValue(14, $this->estadoEstudiante, PDO::PARAM_STR);
		$statement->bindValue(15, $this->idCarrera, PDO::PARAM_INT);
		$statement->bindValue(16, $this->idUsuario, PDO::PARAM_INT);
		$statement->bindValue(17, date("Y-m-d H:i:s", strtotime($this->fechaRegistroEstudiante)), PDO::PARAM_STR);
		$statement->bindValue(18, $this->dniApoderadoEstudiante, PDO::PARAM_STR);
		$statement->bindValue(19, $this->tipoEstudiante, PDO::PARAM_STR);
		$statement->bindValue(20, date("Y-m-d", strtotime($this->fechaNacimientoEstudiante)), PDO::PARAM_STR);
		$statement->bindValue(21, $this->edadEstudiante, PDO::PARAM_INT);
		$statement->bindValue(22, $this->idGrado, PDO::PARAM_INT);
		$statement->bindValue(23, $this->colegioEstudiante, PDO::PARAM_STR);
		$statement->bindValue(24, $this->situacionEstudiante, PDO::PARAM_STR);
		$statement->bindValue(25, $this->tycEstudiante, PDO::PARAM_STR);
		$statement->bindValue(26, $this->sexoEstudiante, PDO::PARAM_STR);
		$statement->bindValue(27, $this->datosUpdated, PDO::PARAM_STR);
		$statement->bindValue(28, $this->passEstudiante, PDO::PARAM_STR);
		$statement->bindValue(29, $this->opcion, PDO::PARAM_INT);
		$statement->bindValue(30, $this->pagina, PDO::PARAM_INT);
		return $statement;
	}

	public function set($metodo)
	{

		$this->idEstudiante		= $metodo('idEstudiante');
		$this->numerodocumentoEstudiante	= $metodo('numerodocumentoEstudiante');
		$this->apellidoEstudiante = $metodo('apellidoEstudiante');
		$this->nombresEstudiante	= $metodo('nombresEstudiante');
		$this->correoEstudiante		= $metodo('correoEstudiante');
		$this->celularEstudiante	= $metodo('celularEstudiante');
		$this->direccionEstudiante		= $metodo('direccionEstudiante');
		$this->nombreApoderadoEstudiante = $metodo('nombreApoderadoEstudiante');
		$this->apellidoApoderadoEstudiante	= $metodo('apellidoApoderadoEstudiante');
		$this->correoApoderadoEstudiante	= $metodo('correoApoderadoEstudiante');
		$this->celularApoderadoEstudiante	= $metodo('celularApoderadoEstudiante');
		$this->modalidadEstudiante			= $metodo('modalidadEstudiante');
		$this->estadoEstudiante		= $metodo('estadoEstudiante');
		$this->idCarrera			= $metodo('idCarrera');
		$this->idUsuario			= $metodo('idUsuario');
		$this->tipodocumentoEstudiante	= $metodo('tipodocumentoEstudiante');	

		$this->dniApoderadoEstudiante			= $metodo('dniApoderadoEstudiante');
		$this->tipoEstudiante			= $metodo('tipoEstudiante');
		$this->fechaNacimientoEstudiante			= $metodo('fechaNacimientoEstudiante');
		$this->edadEstudiante			= $metodo('edadEstudiante');
		$this->idGrado			= $metodo('idGrado');
		$this->tipoEstudiante			= $metodo('tipoEstudiante');
		$this->colegioEstudiante			= $metodo('colegioEstudiante');
		$this->situacionEstudiante			= $metodo('situacionEstudiante');
		$this->tycEstudiante			= $metodo('tycEstudiante');
		$this->tycEstudiante			= $metodo('sexoEstudiante');
	}
}
