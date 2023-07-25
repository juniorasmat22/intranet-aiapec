<?php

namespace entidades;

use PDO;

class Semestre extends Entidad
{
    public $idSemestre;
    public $nombreSemestre;
    public $duracionSemestre;
    public $fechaInicioSemestre;
    public $fechaFinSemestre;
    public $estadoSemestre;



    public function setConsulta($filaConsulta)
    {

        $this->idSemestre = $this->obtenerColumna($filaConsulta, 'id_semestre');
        $this->nombreSemestre = $this->obtenerColumna($filaConsulta, 'nombre_semestre');
        $this->duracionSemestre = $this->obtenerColumna($filaConsulta, 'duracion_semestre');
        $this->fechaInicioSemestre = $this->obtenerColumna($filaConsulta, 'fecha_inicio_semestre');
        $this->fechaFinSemestre = $this->obtenerColumna($filaConsulta, 'fecha_fin_semestre');
        $this->estadoSemestre = $this->obtenerColumna($filaConsulta, 'estado_semestre');
    }
    public function bindValues($statement)
    {
        $statement->bindValue(1, $this->idSemestre, PDO::PARAM_INT);
        $statement->bindValue(2, $this->nombreSemestre, PDO::PARAM_STR);
        $statement->bindValue(3, $this->duracionSemestre, PDO::PARAM_STR);
        $statement->bindValue(4, date("Y-m-d", strtotime($this->fechaInicioSemestre)), PDO::PARAM_STR);
        $statement->bindValue(5, date("Y-m-d", strtotime($this->fechaFinSemestre)), PDO::PARAM_STR);
        $statement->bindValue(6, $this->estadoSemestre, PDO::PARAM_INT);
        $statement->bindValue(7, $this->opcion, PDO::PARAM_INT);
        $statement->bindValue(8, $this->pagina, PDO::PARAM_INT);

        return $statement;
    }

    public function set($metodo)
    {

        $this->idSemestre = $metodo('idSemestre');
        $this->nombreSemestre = $metodo('nombreSemestre');
        $this->duracionSemestre = $metodo('duracionSemestre');
        $this->fechaInicioSemestre = $metodo('fechaInicioSemestre');
        $this->fechaFinSemestre = $metodo('fechaFinSemestre');
        $this->estadoSemestre = $metodo('estadoSemestre');
    }
}
