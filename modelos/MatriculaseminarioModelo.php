<?php

namespace modelos;

class MatriculaseminarioModelo extends Modelo
{
    public function __construct()
    {
        parent::__construct('sp_matricula_seminario_crud(?,?,?,?,?,?,?,?,?,?,?)', 'Matriculaseminario');
    }

    public function get_matricula_seminario_por_estudiante($entidad)
    {
        $entidad->opcion = 6;
        return $this->queryObjects($this->sp, $entidad);
    }
    public function get_matricula_por_seminario_estudiante($entidad)
    {
        $entidad->opcion = 8;
        return $this->queryObjeto($this->sp, $entidad);
    }
}
