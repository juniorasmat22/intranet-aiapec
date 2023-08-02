<?php
namespace modelos;

class DetallepagoModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_detallepago_crud(?,?,?,?,?,?,?)','Detallepago');
	}
	
	
}
