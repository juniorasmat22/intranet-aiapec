<?php
namespace entidades;
use PDO;
class Rol extends Entidad
{
	public $rol_id;
	public $rol_descripcion;
	public $rol_creador;
  public $rol_fecha_creacion;
  public $rol_usu_actualiza;
	public $rol_fecha_actualizacion;



	public function setConsulta($filaConsulta){

		$this->rol_id=$this->obtenerColumna($filaConsulta,'rol_id');
		$this->rol_descripcion=$this->obtenerColumna($filaConsulta,'rol_descripcion');
		$this->rol_creador=$this->obtenerColumna($filaConsulta,'rol_creador');
    $this->rol_fecha_creacion=$this->obtenerColumna($filaConsulta,'rol_fecha_creacion');
    $this->rol_usu_actualiza=$this->obtenerColumna($filaConsulta,'rol_usu_actualiza');
    $this->rol_fecha_actualizacion=$this->obtenerColumna($filaConsulta,'rol_fecha_actualizacion');

	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->rol_id,PDO::PARAM_INT);
		$statement->bindValue(2,$this->rol_descripcion,PDO::PARAM_STR);
		$statement->bindValue(3,$this->rol_creador,PDO::PARAM_STR);
		$statement->bindValue(4,date("Y-m-d H:i:s", strtotime($this->rol_fecha_creacion)),PDO::PARAM_STR);
    $statement->bindValue(5,$this->rol_usu_actualiza,PDO::PARAM_STR);
		$statement->bindValue(6,date("Y-m-d H:i:s", strtotime($this->rol_fecha_actualizacion)),PDO::PARAM_STR);
		$statement->bindValue(7,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(8,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){

		$this->rol_id=$metodo('rol_id');
		$this->rol_descripcion=$metodo('rol_descripcion');
		$this->rol_creador=$metodo('rol_creador');
    $this->rol_fecha_creacion=$metodo('rol_fecha_creacion');
    $this->rol_usu_actualiza=$metodo('rol_usu_actualiza');
    $this->rol_fecha_actualizacion=$metodo('rol_fecha_actualizacion');

	}

}
