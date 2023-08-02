<?php
namespace entidades;
use PDO;
class Pago extends Entidad
{
	public $idPago;
	public $tipoPago;
	public $operacionPago;
	public $totalPago;
	public $reciboPago;
	public $estadoPago;
	public $fechaPago;
	public $idEstudiante;




	public function setConsulta($filaConsulta){
		$this->idPago=$this->obtenerColumna($filaConsulta,'id_pago');
		$this->tipoPago=$this->obtenerColumna($filaConsulta,'tipo_pago');
		$this->operacionPago=$this->obtenerColumna($filaConsulta,'operacion_pago');
		$this->totalPago=$this->obtenerColumna($filaConsulta,'total_pago');
		$this->reciboPago=$this->obtenerColumna($filaConsulta,'recibo_pago');
		$this->estadoPago=$this->obtenerColumna($filaConsulta,'estado_pago');
		$this->fechaPago=$this->obtenerColumna($filaConsulta,'fecha_pago');
		$this->idEstudiante=$this->obtenerColumna($filaConsulta,'id_estudiante');
		
	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->idPago,PDO::PARAM_INT);
		$statement->bindValue(2,$this->tipoPago,PDO::PARAM_INT);
		$statement->bindValue(3,$this->operacionPago,PDO::PARAM_STR);
		$statement->bindValue(4,$this->totalPago,PDO::PARAM_STR);
		$statement->bindValue(5,$this->reciboPago,PDO::PARAM_STR);
		$statement->bindValue(6,$this->estadoPago,PDO::PARAM_STR);
		$statement->bindValue(7,date("Y-m-d H:i:s", strtotime($this->fechaPago)), PDO::PARAM_STR);
        $statement->bindValue(8,$this->idEstudiante,PDO::PARAM_INT);
		$statement->bindValue(9,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(10,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idPago	        = $metodo('idPago');
		$this->tipoPago         = $metodo('tipoPago');
		$this->operacionPago	= $metodo('operacionPago');
		$this->totalPago 	    = $metodo('totalPago');
		$this->reciboPago       = $metodo('reciboPago');
		$this->estadoPago 	    = $metodo('estadoPago');
		$this->fechaPago 	    = $metodo('fechaPago');
		$this->idEstudiante 	= $metodo('idEstudiante');
	}

}
