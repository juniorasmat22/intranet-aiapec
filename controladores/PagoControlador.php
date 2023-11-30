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
		$targetDirectory = "../intranet-administrativa/recursos/pagos/cuotas/";
		$ruta_tmp="recursos/pagos/cuotas/";
			// Genera un nombre único para la imagen
		$uniqueName = uniqid();
		$extension = pathinfo($_FILES["recibos"]["name"], PATHINFO_EXTENSION);
			// Combina el nombre único con la extensión del archivo original
		$targetFile = $targetDirectory . $uniqueName . '.' . $extension;

		$ruta_bd=$ruta_tmp . $uniqueName . '.' . $extension;
		if (move_uploaded_file($_FILES["recibos"]["tmp_name"], $targetFile)){
			$archivo =$ruta_bd;
			$this->entidad->setMetodoPost();
			$this->entidad->reciboPago=$archivo;
			$this->entidad->cajeroPago='Pendiente';
			$this->entidad->estadoPago=1;
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
		}else{
			$respuesta=new Respuesta(false,null,'Hubo un error al subir el pago');
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


	public function editarRecibo()  {
		$this->entidad->setMetodoPost();
		//obtener los datos del recibo para actualizar
		$mi_recibo_actual=$this->modelo->get($this->entidad);
		$rutaArchivoExistente="../intranet-administrativa/".$mi_recibo_actual->resultado->reciboPago;
		//elimina el archivo
		if (file_exists($rutaArchivoExistente)) {
			unlink($rutaArchivoExistente);
		}
		$targetDirectory = "../intranet-administrativa/recursos/pagos/cuotas/";
		$ruta_tmp="recursos/pagos/cuotas/";
			// Genera un nombre único para la imagen
		$uniqueName = uniqid();
		$extension = pathinfo($_FILES["reciboPago"]["name"], PATHINFO_EXTENSION);
			// Combina el nombre único con la extensión del archivo original
		$targetFile = $targetDirectory . $uniqueName . '.' . $extension;
		$ruta_bd=$ruta_tmp . $uniqueName . '.' . $extension;
		if (move_uploaded_file($_FILES["reciboPago"]["tmp_name"], $targetFile)){
			$archivo =$ruta_bd;
			$this->entidad->setMetodoPost();
			$this->entidad->reciboPago=$archivo;
			$respuesta=$this->modelo->editar_recibo($this->entidad);
			$this->respuesta($respuesta);
		}else{
			$respuesta=new Respuesta(false,null,'Hubo un error al subir el pago');
			$this->respuesta($respuesta);
		}
	}
	public function recibo()  {
		$this->entidad->setMetodoGet();
        $respuesta=$this->modelo->get_pago($this->entidad);
		$estudiante= new EstudianteControlador();
		$estudiante->entidad->idEstudiante=$respuesta->resultado->idEstudiante;
		
		$mi_estudiante=$estudiante->modelo->getEstudiante($estudiante->entidad);
		$detalle= new DetallepagoControlador();
		$detalle->entidad->idPago=$respuesta->resultado->idPago;
		$mi_detalle=$detalle->modelo->get_detalle_pago($detalle->entidad);
		
		require_once  'vistas/pagos/ticket.php';
	}
}
