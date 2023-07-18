<?php
namespace modelos;

class CarreraModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_carrera_crud(?,?,?,?,?,?)','Carrera');
	}
	
	public function get_carreras_por_area($entidad)
    {
        $entidad->opcion = 6;
        return $this->queryObjects($this->sp, $entidad);
    }
}
