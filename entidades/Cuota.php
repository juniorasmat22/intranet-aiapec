<?php
namespace entidades;
use PDO;
class Cuota extends Entidad
{
	public $idCuota;
	public $nroCuota;
	public $montoCuota;
	public $tipoCuota;
	public $descuentoCuota;
	public $estadoCuota;
	public $fechaVencimientoCuota;
	public $totalCuota;
	public $idMatricula;
	public $idCosto;




	public function setConsulta($filaConsulta){
		$this->idCuota=$this->obtenerColumna($filaConsulta,'id_cuota');
		$this->nroCuota=$this->obtenerColumna($filaConsulta,'nro_cuota');
		$this->montoCuota=$this->obtenerColumna($filaConsulta,'monto_cuota');
		$this->tipoCuota=$this->obtenerColumna($filaConsulta,'tipo_cuota');
		$this->descuentoCuota=$this->obtenerColumna($filaConsulta,'descuento_cuota');
		$this->estadoCuota=$this->obtenerColumna($filaConsulta,'estado_cuota');
		$this->fechaVencimientoCuota=$this->obtenerColumna($filaConsulta,'fecha_vencimiento_cuota');
		$this->idMatricula=$this->obtenerColumna($filaConsulta,'id_matricula');
		$this->idCosto=$this->obtenerColumna($filaConsulta,'id_costo');
		$this->totalCuota=$this->obtenerColumna($filaConsulta,'total_cuota');
		
	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->idCuota,PDO::PARAM_INT);
		$statement->bindValue(2,$this->nroCuota,PDO::PARAM_INT);
		$statement->bindValue(3,$this->montoCuota,PDO::PARAM_STR);
		$statement->bindValue(4,$this->tipoCuota,PDO::PARAM_STR);
		$statement->bindValue(5,$this->descuentoCuota,PDO::PARAM_STR);
		$statement->bindValue(6,$this->estadoCuota,PDO::PARAM_STR);
		$statement->bindValue(7,date("Y-m-d", strtotime($this->fechaVencimientoCuota)), PDO::PARAM_STR);
		$statement->bindValue(8,$this->totalCuota,PDO::PARAM_STR);
		$statement->bindValue(9,$this->idMatricula,PDO::PARAM_INT);
		$statement->bindValue(10,$this->idCosto,PDO::PARAM_INT);
		$statement->bindValue(11,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(12,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idCuota	        = $metodo('idCuota');
		$this->nroCuota         = $metodo('nroCuota');
		$this->montoCuota	    = $metodo('montoCuota');
		$this->tipoCuota 	    = $metodo('tipoCuota');
		$this->descuentoCuota   = $metodo('descuentoCuota');
		$this->estadoCuota 	    = $metodo('estadoCuota');
		$this->fechaVencimientoCuota 	    = $metodo('fechaVencimientoCuota');
		$this->idMatricula 	    = $metodo('idMatricula');
		$this->idCosto 	    	= $metodo('idCosto');
		$this->totalCuota 	    	= $metodo('totalCuota');
	}

}
