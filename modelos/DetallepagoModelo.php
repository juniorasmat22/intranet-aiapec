<?php
namespace modelos;

class DetallepagoModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_detallepago_crud(?,?,?,?,?,?,?,?)','Detallepago');
	}
	public function get_detalle_pago($entidad) {
		$entidad->opcion = 6;
        return $this->queryObjects($this->sp, $entidad);
	}
	
}
