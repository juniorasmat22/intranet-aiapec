<?php
namespace modelos;

class PagoModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_pago_crud(?,?,?,?,?,?,?,?,?,?,?)','Pago');
	}
	
	public function crear_pago($entidad){
		$entidad->opcion=1;
		return $this->noQueryId($this->sp,$entidad);
	}
	public function get_pago_por_cuota($entidad){
		$entidad->opcion=6;
		return $this->queryObjeto($this->sp,$entidad);
	}

	public function get_pago($entidad){
		$entidad->opcion=8;
		return $this->queryObjeto($this->sp,$entidad);
	}
	public function editar_estado($objeto){
		$objeto->opcion=7;
		return $this->noQuery($this->sp,$objeto);
	}
	public function editar_recibo($objeto){
		$objeto->opcion=9;
		return $this->noQuery($this->sp,$objeto);
	}
}
