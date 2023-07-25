<?php

namespace entidades;

use PDO;

class Matricula extends Entidad
{
	public $idMatricula;
	public $idProgramaAcademia;
	public $programaNivel;
	public $programaSede;
	public $cuotasMatricula;
	public $costoOriginalMatricula;
	public $descuentoMatricula;
	public $promocionMatricula;
	public $costoFinalMatricula;
	public $fechaMatricula;
	public $deudaMatricula;
	public $estadoMatricula;



	public function setConsulta($filaConsulta)
	{
		$this->idMatricula = $this->obtenerColumna($filaConsulta, 'id_matricula');
		$this->idProgramaAcademia = $this->obtenerColumna($filaConsulta, 'id_programas_academia');
		$this->programaNivel = $this->obtenerColumna($filaConsulta, 'programa_nivel');
        $this->programaSede = $this->obtenerColumna($filaConsulta, 'programa_sede');
		$this->cuotasMatricula = $this->obtenerColumna($filaConsulta, 'cuotas_matricula');
		$this->costoOriginalMatricula = $this->obtenerColumna($filaConsulta, 'costo_original_matricula');
        $this->descuentoMatricula = $this->obtenerColumna($filaConsulta, 'descuento_matricula');
		$this->promocionMatricula = $this->obtenerColumna($filaConsulta, 'promocion_matricula');
		$this->costoFinalMatricula = $this->obtenerColumna($filaConsulta, 'costo_final_matricula');
        $this->fechaMatricula = $this->obtenerColumna($filaConsulta, 'fecha_matricula');
		$this->deudaMatricula = $this->obtenerColumna($filaConsulta, 'deuda_matricula');
		$this->estadoMatricula = $this->obtenerColumna($filaConsulta, 'estado_matricula');
        
    }
	public function bindValues($statement)
	{
		$statement->bindValue(1, $this->idMatricula, PDO::PARAM_INT);
		$statement->bindValue(2, $this->idProgramaAcademia, PDO::PARAM_STR);
		$statement->bindValue(3, $this->programaNivel, PDO::PARAM_INT);
        $statement->bindValue(4, $this->programaSede, PDO::PARAM_INT);
		$statement->bindValue(5, $this->cuotasMatricula, PDO::PARAM_STR);
		$statement->bindValue(6, $this->costoOriginalMatricula, PDO::PARAM_INT);
        $statement->bindValue(7, $this->descuentoMatricula, PDO::PARAM_INT);
		$statement->bindValue(8, $this->promocionMatricula, PDO::PARAM_STR);
		$statement->bindValue(9, $this->costoFinalMatricula, PDO::PARAM_INT);
        $statement->bindValue(10, date("Y-m-d H:i:s", strtotime($this->fechaMatricula)), PDO::PARAM_STR);
		$statement->bindValue(11, $this->deudaMatricula, PDO::PARAM_STR);
		$statement->bindValue(12, $this->estadoMatricula, PDO::PARAM_INT);
		$statement->bindValue(13, $this->opcion, PDO::PARAM_INT);
		$statement->bindValue(14, $this->pagina, PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo)
	{
		$this->idMatricula	 = $metodo('idMatricula');
		$this->idProgramaAcademia      = $metodo('idProgramaAcademia');
		$this->programaNivel	   = $metodo('programaNivel');
        $this->programaSede	 = $metodo('programaSede');
		$this->cuotasMatricula      = $metodo('cuotasMatricula');
		$this->costoOriginalMatricula	   = $metodo('costoOriginalMatricula');
        $this->descuentoMatricula	 = $metodo('descuentoMatricula');
		$this->promocionMatricula      = $metodo('promocionMatricula');
		$this->costoFinalMatricula	   = $metodo('costoFinalMatricula');
        $this->fechaMatricula	 = $metodo('fechaMatricula');
		$this->deudaMatricula      = $metodo('deudaMatricula');
		$this->estadoMatricula	   = $metodo('estadoMatricula');
		
    }
}
