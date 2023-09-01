<?php

namespace entidades;

use PDO;

class Registroconcurso extends Entidad
{
	public $idRegistroConcurso;
	public $fechaRegistro;
	public $montopago;
	public $tipoPago;
	public $operacion;
    public $idConcurso;
	public $idEstudiante;
	public $recibo;
	public $estado;




	public function setConsulta($filaConsulta)
	{
		$this->idRegistroConcurso = $this->obtenerColumna($filaConsulta, 'id_registro_concurso');
		$this->fechaRegistro = $this->obtenerColumna($filaConsulta, 'fecha_registro');
		$this->montopago = $this->obtenerColumna($filaConsulta, 'monto_pago');
		$this->tipoPago = $this->obtenerColumna($filaConsulta, 'tipo_pago');
		$this->operacion = $this->obtenerColumna($filaConsulta, 'operacion');
		$this->recibo = $this->obtenerColumna($filaConsulta, 'recibo');
		$this->estado = $this->obtenerColumna($filaConsulta, 'estado');
		$this->idConcurso = $this->obtenerColumna($filaConsulta, 'id_concurso');
		$this->idEstudiante = $this->obtenerColumna($filaConsulta, 'id_estudiante');
		
    }
	public function bindValues($statement)
	{
		$statement->bindValue(1, $this->idRegistroConcurso, PDO::PARAM_INT);
		$statement->bindValue(2, date("Y-m-d H:i:s", strtotime($this->fechaRegistro)), PDO::PARAM_STR);
        $statement->bindValue(3, $this->montopago, PDO::PARAM_STR);
		$statement->bindValue(4, $this->tipoPago, PDO::PARAM_STR);
        $statement->bindValue(5, $this->operacion, PDO::PARAM_STR);
		$statement->bindValue(6, $this->recibo, PDO::PARAM_STR);
        $statement->bindValue(7, $this->estado, PDO::PARAM_STR);
		$statement->bindValue(8, $this->idConcurso, PDO::PARAM_INT);
        $statement->bindValue(9, $this->idEstudiante, PDO::PARAM_INT);
		$statement->bindValue(10, $this->opcion, PDO::PARAM_INT);
		$statement->bindValue(11, $this->pagina, PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo)
	{
		$this->idRegistroConcurso	 = $metodo('idRegistroConcurso');
		$this->fechaRegistro        = $metodo('fechaRegistro');
        $this->montopago	        = $metodo('montopago');
		$this->tipoPago             = $metodo('tipoPago');
        $this->operacion	        = $metodo('operacion');
		$this->recibo               = $metodo('recibo');
        $this->estado	            = $metodo('estado');
		$this->idConcurso           = $metodo('idConcurso');
		$this->idEstudiante         = $metodo('idEstudiante');
		
    }
}
