<?php

namespace entidades;

use PDO;

class Concurso extends Entidad
{
	public $idConcurso;
	public $nombreConcurso;
	public $fechaConcurso;
    public $horaConcurso;
	public $fechaInicioConcurso;
	public $fechaFinConcurso;
	public $descripcionConcurso;
	public $categoriaConcurso;
	public $lugarConcurso;
	public $estadoConcurso;
	public $portadaConcurso;



	public function setConsulta($filaConsulta)
	{
		$this->idConcurso = $this->obtenerColumna($filaConsulta, 'id_concurso');
		$this->nombreConcurso = $this->obtenerColumna($filaConsulta, 'nombre_concurso');
		$this->fechaConcurso = $this->obtenerColumna($filaConsulta, 'fecha_concurso');
        $this->horaConcurso = $this->obtenerColumna($filaConsulta, 'hora_concurso');
		$this->fechaInicioConcurso = $this->obtenerColumna($filaConsulta, 'fecha_inicio_concurso');
		$this->fechaFinConcurso = $this->obtenerColumna($filaConsulta, 'fecha_fin_concurso');
		$this->descripcionConcurso = $this->obtenerColumna($filaConsulta, 'descripcion_concurso');
		$this->categoriaConcurso = $this->obtenerColumna($filaConsulta, 'categoria_concurso');
		$this->lugarConcurso = $this->obtenerColumna($filaConsulta, 'lugar_concurso');
		$this->estadoConcurso = $this->obtenerColumna($filaConsulta, 'estado_concurso');
		$this->portadaConcurso = $this->obtenerColumna($filaConsulta, 'portada_concurso');
    }
	public function bindValues($statement)
	{
		$statement->bindValue(1, $this->idConcurso, PDO::PARAM_INT);
		$statement->bindValue(2, $this->nombreConcurso, PDO::PARAM_STR);
        $statement->bindValue(3, date("Y-m-d", strtotime($this->fechaConcurso)), PDO::PARAM_STR);
		$statement->bindValue(4, date("H:i:s", strtotime($this->horaConcurso)), PDO::PARAM_STR);
        $statement->bindValue(5, date("Y-m-d", strtotime($this->fechaInicioConcurso)), PDO::PARAM_INT);
		$statement->bindValue(6, date("Y-m-d", strtotime($this->fechaFinConcurso)), PDO::PARAM_STR);
        $statement->bindValue(7, $this->descripcionConcurso, PDO::PARAM_STR);
		$statement->bindValue(8, $this->categoriaConcurso, PDO::PARAM_STR);
        $statement->bindValue(9, $this->lugarConcurso, PDO::PARAM_STR);
		$statement->bindValue(10, $this->estadoConcurso, PDO::PARAM_STR);
        $statement->bindValue(11, $this->portadaConcurso, PDO::PARAM_INT);
		$statement->bindValue(12, $this->opcion, PDO::PARAM_INT);
		$statement->bindValue(13, $this->pagina, PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo)
	{
		$this->idConcurso	        = $metodo('idConcurso');
		$this->nombreConcurso       = $metodo('nombreConcurso');
		$this->fechaConcurso        = $metodo('fechaConcurso');
		$this->horaConcurso         = $metodo('horaConcurso');
		$this->fechaInicioConcurso  = $metodo('fechaInicioConcurso');
		$this->fechaFinConcurso     = $metodo('fechaFinConcurso');
		$this->descripcionConcurso  = $metodo('descripcionConcurso');
		$this->categoriaConcurso    = $metodo('categoriaConcurso');
		$this->lugarConcurso        = $metodo('lugarConcurso');
		$this->estadoConcurso       = $metodo('estadoConcurso');
		$this->portadaConcurso      = $metodo('portadaConcurso');
		
    }
}
