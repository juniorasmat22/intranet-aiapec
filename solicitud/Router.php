<?php
namespace solicitud;
class Router{
	public static function getSolicitud(){
		$solicitud=new Solicitud();
		$solicitud->controlador=isset($_GET['c'])?$_GET['c']:'plantilla';
		$solicitud->accion=isset($_GET['a'])?$_GET['a']:'index';
		return $solicitud;
	}
}
