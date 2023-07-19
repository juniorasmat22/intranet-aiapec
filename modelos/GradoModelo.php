<?php
namespace modelos;

class GradoModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_grado_crud(?,?,?,?,?)','Grado');
	}
	
    public function get_grados_por_nivel($entidad)
    {
        $entidad->opcion = 6;
        return $this->queryObjects($this->sp, $entidad);
    }
}
