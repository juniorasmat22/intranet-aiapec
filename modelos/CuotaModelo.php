<?php
namespace modelos;

class CuotaModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_cuota_crud(?,?,?,?,?,?,?,?,?,?)','Cuota');
	}
	

}
