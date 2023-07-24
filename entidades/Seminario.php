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
    public $descripcionSeminario;
    public $resumenSeminario;



    public function setConsulta($filaConsulta)
    {
        $this->idSeminario = $this->obtenerColumna($filaConsulta, 'id_seminario');
        $this->nombreSeminario = $this->obtenerColumna($filaConsulta, 'nombre_seminario');
        $this->fechaSeminario = $this->obtenerColumna($filaConsulta, 'fecha_seminario');
        $this->horaInicioSeminario = $this->obtenerColumna($filaConsulta, 'hora_inicio_seminario');
        $this->horaFinSeminario = $this->obtenerColumna($filaConsulta, 'hora_fin_seminario');
        $this->imagenSeminario = $this->obtenerColumna($filaConsulta, 'imagen_seminario');
        $this->precioSeminario = $this->obtenerColumna($filaConsulta, 'precio_seminario');
        $this->estadoSeminario = $this->obtenerColumna($filaConsulta, 'estado_seminario');
        $this->fechaRegistroSeminario = $this->obtenerColumna($filaConsulta, 'fecha_registro_seminario');
        $this->descripcionSeminario = $this->obtenerColumna($filaConsulta, 'descripcion_seminario');
        $this->resumenSeminario = $this->obtenerColumna($filaConsulta, 'resumen_seminario');
    }
    public function bindValues($statement)
    {
        $statement->bindValue(1, $this->idSeminario, PDO::PARAM_INT);
        $statement->bindValue(2, $this->nombreSeminario, PDO::PARAM_STR);
        $statement->bindValue(3, date("Y-m-d H:i:s", strtotime($this->fechaSeminario)), PDO::PARAM_STR);
        $statement->bindValue(4, date("H:i:s", strtotime($this->horaInicioSeminario)), PDO::PARAM_STR);
        $statement->bindValue(5, date("H:i:s", strtotime($this->horaFinSeminario)), PDO::PARAM_STR);
        $statement->bindValue(6, $this->imagenSeminario, PDO::PARAM_STR);
        $statement->bindValue(7, $this->precioSeminario, PDO::PARAM_INT);
        $statement->bindValue(8, $this->estadoSeminario, PDO::PARAM_INT);
        $statement->bindValue(9, date("Y-m-d H:i:s", strtotime($this->fechaRegistroSeminario)), PDO::PARAM_STR);
        $statement->bindValue(10, $this->descripcionSeminario, PDO::PARAM_STR);
        $statement->bindValue(11, $this->resumenSeminario, PDO::PARAM_STR);
        $statement->bindValue(12, $this->opcion, PDO::PARAM_INT);
        $statement->bindValue(13, $this->pagina, PDO::PARAM_INT);

        return $statement;
    }

    public function set($metodo)
    {
        $this->idSeminario     = $metodo('idSeminario');
        $this->nombreSeminario      = $metodo('nombreSeminario');
        $this->fechaSeminario       = $metodo('fechaSeminario');
        $this->horaInicioSeminario            = $metodo('horaInicioSeminario');
        $this->horaFinSeminario        = $metodo('horaFinSeminario');
        $this->imagenSeminario            = $metodo('imagenSeminario');
        $this->precioSeminario        = $metodo('precioSeminario');
        $this->estadoSeminario            = $metodo('estadoSeminario');
        $this->fechaRegistroSeminario        = $metodo('fechaRegistroSeminario');
        $this->descripcionSeminario            = $metodo('descripcionSeminario');
        $this->resumenSeminario        = $metodo('resumenSeminario');
    }
}
