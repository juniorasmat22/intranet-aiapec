<?php
namespace entidades;
use PDO;
class Programasacademia extends Entidad
{
	public $idProgramasAcademia;
	public $nombreProgramasAcademia;
	public $tipoProgramasAcademia;
	public $precioProgramasAcademia;
	public $idSemestre;
	public $estadoProgramasAcademia;
	public $portadaPrograma;
	public $descripcionPrograma;
	public $precioCuotasPrograma;


	public function setConsulta($filaConsulta){
		$this->idProgramasAcademia=$this->obtenerColumna($filaConsulta,'id_programas_academia');
		$this->nombreProgramasAcademia=$this->obtenerColumna($filaConsulta,'nombre_programa_academia');
		$this->tipoProgramasAcademia=$this->obtenerColumna($filaConsulta,'tipo_programa_academia');
		$this->precioProgramasAcademia=$this->obtenerColumna($filaConsulta,'precio_programa_academia');
        $this->idSemestre=$this->obtenerColumna($filaConsulta,'id_semestre');
        $this->estadoProgramasAcademia=$this->obtenerColumna($filaConsulta,'estado_programas_academia');
        $this->portadaPrograma=$this->obtenerColumna($filaConsulta,'portada_programa');
        $this->descripcionPrograma=$this->obtenerColumna($filaConsulta,'descripcion_programa');
		$this->precioCuotasPrograma=$this->obtenerColumna($filaConsulta,'precio_cuotas_programa');
	}
	
	public function bindValues($statement){
		$statement->bindValue(1,$this->idProgramasAcademia,PDO::PARAM_INT);
		$statement->bindValue(2,$this->nombreProgramasAcademia,PDO::PARAM_STR);
		$statement->bindValue(3,$this->tipoProgramasAcademia,PDO::PARAM_STR);
		$statement->bindValue(4,$this->precioProgramasAcademia,PDO::PARAM_STR);
		$statement->bindValue(5,$this->idSemestre,PDO::PARAM_INT);
		$statement->bindValue(6,$this->estadoProgramasAcademia,PDO::PARAM_INT);
		$statement->bindValue(7,$this->portadaPrograma,PDO::PARAM_STR);
		$statement->bindValue(8,$this->descripcionPrograma,PDO::PARAM_STR);
		$statement->bindValue(9,$this->precioCuotasPrograma,PDO::PARAM_STR);
		$statement->bindValue(10,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(11,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idProgramasAcademia	        = $metodo('idProgramasAcademia');
		$this->nombreProgramasAcademia      = $metodo('nombreProgramasAcademia');
		$this->tipoProgramasAcademia        = $metodo('tipoProgramasAcademia');
		$this->precioProgramasAcademia      = $metodo('precioProgramasAcademia');
		$this->idSemestre                   = $metodo('idSemestre');
		$this->estadoProgramasAcademia      = $metodo('estadoProgramasAcademia');
		$this->portadaPrograma      		= $metodo('portadaPrograma');
		$this->descripcionPrograma      	= $metodo('descripcionPrograma');
		$this->precioCuotasPrograma      	= $metodo('precioCuotasPrograma');
	}
}
