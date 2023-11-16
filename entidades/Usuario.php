<?php

namespace entidades;

use PDO;

class Usuario extends Entidad
{
	public $idUsuario;
	public $nombreUsuario;
	public $passwordUsuario;
	public $estadoUsuario;
	public $fechaRegistroUsario;
	public $nombresEstudiante;
	public $datosUpdated;
	public $idEstudiante;
	public $idRol;

	public function setConsulta($filaConsulta)
	{
		$this->idUsuario = $this->obtenerColumna($filaConsulta, 'id_usuario');
		$this->nombreUsuario = $this->obtenerColumna($filaConsulta, 'nombre_usuario');
		$this->passwordUsuario = $this->obtenerColumna($filaConsulta, 'password_usuario');
		$this->estadoUsuario = $this->obtenerColumna($filaConsulta, 'estado_usuario');
		$this->fechaRegistroUsario = $this->obtenerColumna($filaConsulta, 'fecha_registro_usuario');
		$this->nombresEstudiante = $this->obtenerColumna($filaConsulta, 'nombres_estudiante');
		$this->datosUpdated = $this->obtenerColumna($filaConsulta, 'datos_update');
		$this->idEstudiante = $this->obtenerColumna($filaConsulta, 'id_estudiante');
		$this->idRol = $this->obtenerColumna($filaConsulta, 'id_rol');
	}
	public function bindValues($statement)
	{
		$statement->bindValue(1, $this->idUsuario, PDO::PARAM_INT);
		$statement->bindValue(2, $this->nombreUsuario, PDO::PARAM_INT);
		$statement->bindValue(3, $this->passwordUsuario, PDO::PARAM_STR);
		$statement->bindValue(4, $this->estadoUsuario, PDO::PARAM_STR);
		$statement->bindValue(5, date("Y-m-d H:i:s", strtotime($this->fechaRegistroUsario)), PDO::PARAM_STR);
		$statement->bindValue(6, $this->opcion, PDO::PARAM_INT);
		$statement->bindValue(7, $this->pagina, PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo)
	{
		$this->idUsuario = $metodo('idUsuario');
		$this->nombreUsuario = $metodo('nombreUsuario');
		$this->passwordUsuario = $metodo('passwordUsuario');
		$this->estadoUsuario = $metodo('estadoUsuario');
		$this->fechaRegistroUsario = $metodo('fechaRegistroUsario');
	}

	public function iniciarSesion()
	{	
		$_SESSION['id'] = $this->idUsuario;
		$_SESSION['useranem'] = $this->nombreUsuario;
		$_SESSION['name'] = $this->nombresEstudiante;
		$_SESSION['update'] = $this->datosUpdated;
		$_SESSION['idEstudiante'] = $this->idEstudiante;
		$_SESSION['idRol'] = $this->idRol;

	}
	
}
