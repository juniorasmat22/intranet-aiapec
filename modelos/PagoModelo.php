<?php
namespace modelos;

class PagoModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_pago_crud(?,?,?,?,?,?,?,?,?,?)','Pago');
	}
	
	public function crear_pago($entidad){
		$entidad->opcion=1;
		return $this->noQueryId($this->sp,$entidad);
	}
}
