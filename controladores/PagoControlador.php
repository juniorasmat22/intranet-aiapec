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
		$this->entidad->cajeroPago='Pendiente';
		$this->entidad->estadoPago=2;
        $respuesta=$this->modelo->crear_pago($this->entidad);
		if ($respuesta->resultado) {
			$detalle= new DetallepagoControlador();
			$detalle->entidad->setMetodoPost();
			$detalle->entidad->idPago=$respuesta->resultado['0']['ID'];
			$detalle->entidad->cantidad=1;
			$respuesta2=$detalle->modelo->crear($detalle->entidad);
			$this->respuesta($respuesta2);
		} else {
			$respuesta=new Respuesta(false,null,'Hubo un error al registrar el pago');
			$this->respuesta($respuesta);
		}
	}
	public function ver(){

		$id_pago=isset($_GET['idCuota'])?$_GET['idCuota']:null;
		$this->entidad->idPago=$id_pago;
		$respuesta= $this->modelo->get_pago_por_cuota($this->entidad);
		if ($respuesta->respuesta) {
			$detalle= new DetallepagoControlador();
			$detalle->entidad->idPago=$respuesta->resultado->idPago;
			$mi_detalle=$detalle->modelo->get_detalle_pago($detalle->entidad);
			
		}
		$vista = 'vistas/pagos/verPago.php';
		require 'vistas/plantilla/index.php';
	}
	public function get_estado(){
        $this->entidad->setMetodoGet();
        $respuesta=$this->modelo->get_pago($this->entidad);
        $this->respuesta($respuesta);
    }
	public function editarEstado()  {
		$this->entidad->setMetodoPost();
        $respuesta=$this->modelo->editar_estado($this->entidad);
        $this->respuesta($respuesta);
	}

	public function editarRecibo()  {
		$archivo =file_get_contents($_FILES["reciboPago"]["tmp_name"]);
		$this->entidad->setMetodoPost();
		$this->entidad->reciboPago=$archivo;
        $respuesta=$this->modelo->editar_recibo($this->entidad);
        $this->respuesta($respuesta);
	}
}
