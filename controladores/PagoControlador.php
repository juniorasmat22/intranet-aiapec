<?php
namespace controladores;

use nucleo\Respuesta;

class PagoControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('PagoModelo','Pago','');
	}
	
	public function crearPago(){

		$archivo =file_get_contents($_FILES["recibos"]["tmp_name"]);
        $this->entidad->setMetodoPost();
		$this->entidad->reciboPago=$archivo;
        $respuesta=$this->modelo->crear_pago($this->entidad);
		if ($respuesta->resultado) {
			$detalle= new DetallepagoControlador();
			$detalle->entidad->setMetodoPost();
			$detalle->entidad->idPago=$respuesta->resultado['0']['ID'];
			$respuesta2=$detalle->modelo->crear($detalle->entidad);
			$this->respuesta($respuesta2);
		} else {
			$respuesta=new Respuesta(false,null,'Hubo un error al registrar el pago');
			$this->respuesta($respuesta);
		}
		
        
	}
}
