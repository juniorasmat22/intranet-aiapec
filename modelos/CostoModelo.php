<?php
namespace modelos;

class CostoModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_costo_crud(?,?,?,?,?,?)','Costo');
	}

	public function get_costo_por_programa($entidad)  {
		$entidad->opcion = 6;
        return $this->queryObjects($this->sp, $entidad);
	}
	

}
