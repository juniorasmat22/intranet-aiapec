<?php
namespace entidades;
use PDO;
class Detallepago extends Entidad
{
	public $idDetallePago;
	public $conceptoPago;
    public $montoPago;
    public $idPago;
    public $idCuota;



	public function setConsulta($filaConsulta){
		$this->idDetallePago=$this->obtenerColumna($filaConsulta,'id_detalle_pago');
		$this->conceptoPago=$this->obtenerColumna($filaConsulta,'concepto_pago');
		$this->montoPago=$this->obtenerColumna($filaConsulta,'monto_pago');
		$this->idPago=$this->obtenerColumna($filaConsulta,'id_pago');
		$this->idCuota=$this->obtenerColumna($filaConsulta,'id_cuota');
	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->idDetallePago,PDO::PARAM_INT);
		$statement->bindValue(2,$this->conceptoPago,PDO::PARAM_STR);
		$statement->bindValue(3,$this->montoPago,PDO::PARAM_STR);
		$statement->bindValue(4,$this->idPago,PDO::PARAM_INT);
		$statement->bindValue(5,$this->idCuota,PDO::PARAM_INT);
		$statement->bindValue(6,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(7,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idDetallePago	    = $metodo('idDetallePago');
		$this->conceptoPago         = $metodo('conceptoPago');
		$this->montoPago            = $metodo('montoPago');
		$this->idPago               = $metodo('idPago');
		$this->idCuota              = $metodo('idCuota');
	}

}
