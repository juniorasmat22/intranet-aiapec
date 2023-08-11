<?php

namespace entidades;

use PDO;

class Matriculaseminario extends Entidad
{
    public $idMatSeminario;
    public $idEstudiante;
    public $idSeminario;
    public $fechaMatSeminario;
    public $montoPagoSeminario;
    public $tipoPagoSeminario;
    public $operacion;
    public $recibo;
    public $estado;



    public function setConsulta($filaConsulta)
    {
        $this->idMatSeminario = $this->obtenerColumna($filaConsulta, 'id_mat_seminario');
        $this->idEstudiante = $this->obtenerColumna($filaConsulta, 'id_estudiante');
        $this->idSeminario = $this->obtenerColumna($filaConsulta, 'id_seminario');
        $this->fechaMatSeminario = $this->obtenerColumna($filaConsulta, 'fecha_mat_seminario');
        $this->montoPagoSeminario = $this->obtenerColumna($filaConsulta, 'monto_mat_seminario');
        $this->tipoPagoSeminario = $this->obtenerColumna($filaConsulta, 'tipo_pago_mat_seminario');
        $this->operacion = $this->obtenerColumna($filaConsulta, 'operacion');
        $this->recibo = $this->obtenerColumna($filaConsulta, 'recibo');
        $this->estado = $this->obtenerColumna($filaConsulta, 'estado');
    }
    public function bindValues($statement)
    {
        $statement->bindValue(1, $this->idMatSeminario, PDO::PARAM_INT);
        $statement->bindValue(2, $this->idEstudiante, PDO::PARAM_INT);
        $statement->bindValue(3, $this->idSeminario, PDO::PARAM_INT);
        $statement->bindValue(4, date("Y-m-d H:i:s", strtotime($this->fechaMatSeminario)), PDO::PARAM_STR);
        $statement->bindValue(5, $this->montoPagoSeminario, PDO::PARAM_STR);
        $statement->bindValue(6, $this->tipoPagoSeminario, PDO::PARAM_STR);
        $statement->bindValue(7, $this->operacion, PDO::PARAM_STR);
        $statement->bindValue(8, $this->recibo, PDO::PARAM_LOB);
        $statement->bindValue(9, $this->estado, PDO::PARAM_STR);
        $statement->bindValue(10, $this->opcion, PDO::PARAM_INT);
        $statement->bindValue(11, $this->pagina, PDO::PARAM_INT);

        return $statement;
    }

    public function set($metodo)
    {
        $this->idSeminario          = $metodo('idSeminario');
        $this->idEstudiante         = $metodo('idEstudiante');
        $this->idSeminario          = $metodo('idSeminario');
        $this->fechaMatSeminario    = $metodo('fechaMatSeminario');
        $this->montoPagoSeminario   = $metodo('montoPagoSeminario');
        $this->tipoPagoSeminario    = $metodo('tipoPagoSeminario');
        $this->operacion            = $metodo('operacion');
        $this->recibo               = $metodo('recibo');
    }
}
