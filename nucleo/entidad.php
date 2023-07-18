<?php
namespace entidades;
use nucleo\Request;
abstract class Entidad{
	public $opcion;
	public $pagina;
	abstract public function setConsulta($filaConsulta);
	abstract public function set($metodo);
	public function setMetodoPost(){
		$this->set(function($nombre){return Request::obtenerPost($nombre);});
	}
	public function setMetodoGet(){
		$this->set(function($nombre){return Request::obtenerGet($nombre);});
	}
	public function obtenerColumna($fila,$nombre)
	{
		return Request::obtenerColumna($fila,$nombre);
	}
}
