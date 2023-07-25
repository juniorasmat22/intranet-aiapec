<?php

namespace entidades;

use PDO;

class Sede extends Entidad
{
    public $idSede;
    public $nombreSede;



    public function setConsulta($filaConsulta)
    {

        $this->idSede = $this->obtenerColumna($filaConsulta, 'id_sede');
        $this->nombreSede = $this->obtenerColumna($filaConsulta, 'sede_nombre');
           
    }
    public function bindValues($statement)
    {
        $statement->bindValue(1, $this->idSede, PDO::PARAM_INT);
        $statement->bindValue(2, $this->nombreSede, PDO::PARAM_STR);
        $statement->bindValue(3, $this->opcion, PDO::PARAM_INT);
        $statement->bindValue(4, $this->pagina, PDO::PARAM_INT);

        return $statement;
    }

    public function set($metodo)
    {

        $this->idSede = $metodo('idSede');
        $this->nombreSede = $metodo('nombreSede');
    }
}
