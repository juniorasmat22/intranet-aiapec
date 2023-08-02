<?php
namespace modelos;

class CuotaModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_cuota_crud(?,?,?,?,?,?,?,?,?,?,?,?)','Cuota');
	}
	
	public function get_cuota_por_matricula($entidad)  {
		$entidad->opcion = 6;
        return $this->queryObjects($this->sp, $entidad);
	}
}
