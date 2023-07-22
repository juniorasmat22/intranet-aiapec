<?php
namespace entidades;
use PDO;
class Seminario extends Entidad
{
	public $idSeminario;
	public $nombreSeminario;
	public $fechaSeminario;
	public $horaInicioSeminario;
	public $horaFinSeminario;
	public $imagenSeminario;
	public $precioSeminario;
    public $estadoSeminario;
	public $fechaRegistroSeminario;



	public function setConsulta($filaConsulta){
		$this->idSeminario=$this->obtenerColumna($filaConsulta,'id_seminario');
		$this->nombreSeminario=$this->obtenerColumna($filaConsulta,'nombre_seminario');
		$this->fechaSeminario=$this->obtenerColumna($filaConsulta,'fecha_seminario');
		$this->horaInicioSeminario=$this->obtenerColumna($filaConsulta,'hora_inicio_seminario');
		$this->horaFinSeminario=$this->obtenerColumna($filaConsulta,'hora_fin_seminario');
		$this->imagenSeminario=$this->obtenerColumna($filaConsulta,'imagen_seminario');
		$this->precioSeminario=$this->obtenerColumna($filaConsulta,'precio_seminario');
		$this->estadoSeminario=$this->obtenerColumna($filaConsulta,'estado_seminario');
		$this->fechaRegistroSeminario=$this->obtenerColumna($filaConsulta,'nivel_descripcion');
		
	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->idSeminario,PDO::PARAM_INT);
		$statement->bindValue(2,$this->nombreSeminario,PDO::PARAM_STR);
		$statement->bindValue(3,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(4,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idSeminario	 = $metodo('idNivel');
		$this->nombreSeminario      = $metodo('descripcionNivel');
	}

}
