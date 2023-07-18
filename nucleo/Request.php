<?php
namespace nucleo;

class Request
{
	public static function  obtenerPost($nombre){

		return isset($_POST[$nombre])?$_POST[$nombre]:null;
	}
	public static function  obtenerGet($nombre){
		return isset($_GET[$nombre])?$_GET[$nombre]:null;
	}
	public static function obtenerColumna($fila,$nombre)
	{
		return isset($fila[strtolower($nombre)])?$fila[strtolower($nombre)]:null;
	}
}
