<?php
namespace solicitud;
class Solicitud{
    public $controlador;
    public $accion;
    public function __construct(){
    	$this->controlador='plantilla';
    	$this->accion='index';
    }
}
