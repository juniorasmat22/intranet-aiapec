<?php

namespace entidades;

use PDO;

class Evaluacion extends Entidad
{
    public $idEvaluacion;
    public $tipoEvaluacion;
    public $semanaEvaluacion;
    public $descripcionEvaluacion;
    public $cantidadPreguntas;
    public $estadoEvaluacion;
    public $fechaEvaluacion;
    public $fechaRegistro;
    public $idArea;
    public $idAula;
    public $rutaSolucionario;

    public function setConsulta($filaConsulta)
    {
        $this->idEvaluacion = $this->obtenerColumna($filaConsulta, 'id_evaluacion');
        $this->tipoEvaluacion = $this->obtenerColumna($filaConsulta, 'tipo_evaluacion');
        $this->semanaEvaluacion = $this->obtenerColumna($filaConsulta, 'semana_evaluacion');
        $this->descripcionEvaluacion = $this->obtenerColumna($filaConsulta, 'descripcion_evaluacion');
        $this->cantidadPreguntas = $this->obtenerColumna($filaConsulta, 'cantidad_preguntas');
        $this->estadoEvaluacion = $this->obtenerColumna($filaConsulta, 'estado_evaluacion');
        $this->fechaEvaluacion = $this->obtenerColumna($filaConsulta, 'fecha_evaluacion');
        $this->fechaRegistro = $this->obtenerColumna($filaConsulta, 'fecha_registro');
        $this->idArea = $this->obtenerColumna($filaConsulta, 'id_area');
        $this->idAula = $this->obtenerColumna($filaConsulta, 'id_aula');
        $this->rutaSolucionario=$this->obtenerColumna($filaConsulta, 'ruta_solucionario');
    }

    public function bindValues($statement)
    {
        $statement->bindValue(1, $this->idEvaluacion, PDO::PARAM_INT);
        $statement->bindValue(2, $this->tipoEvaluacion, PDO::PARAM_STR);
        $statement->bindValue(3, $this->semanaEvaluacion, PDO::PARAM_INT);
        $statement->bindValue(4, $this->descripcionEvaluacion, PDO::PARAM_STR);
        $statement->bindValue(5, $this->cantidadPreguntas, PDO::PARAM_INT);
        $statement->bindValue(6, $this->estadoEvaluacion, PDO::PARAM_BOOL);
        $statement->bindValue(7, $this->fechaEvaluacion, PDO::PARAM_STR);
        $statement->bindValue(8, date("Y-m-d H:i:s", strtotime($this->fechaRegistro)), PDO::PARAM_STR);
        $statement->bindValue(9, $this->idArea, PDO::PARAM_INT);
        $statement->bindValue(10, $this->idAula, PDO::PARAM_INT);
        $statement->bindValue(11, $this->opcion, PDO::PARAM_INT);
        $statement->bindValue(12, $this->pagina, PDO::PARAM_INT);

        return $statement;
    }

    public function set($metodo)
    {
        $this->idEvaluacion = $metodo('idEvaluacion');
        $this->tipoEvaluacion = $metodo('tipoEvaluacion');
        $this->semanaEvaluacion = $metodo('semanaEvaluacion');
        $this->descripcionEvaluacion = $metodo('descripcionEvaluacion');
        $this->cantidadPreguntas = $metodo('cantidadPreguntas');
        $this->estadoEvaluacion = $metodo('estadoEvaluacion');
        $this->fechaEvaluacion = $metodo('fechaEvaluacion');
        $this->fechaRegistro = $metodo('fechaRegistro');
        $this->idArea = $metodo('idArea');
        $this->idAula = $metodo('idAula');
    }
}

?>
