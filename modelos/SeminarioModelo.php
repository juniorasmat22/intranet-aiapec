<?php
namespace modelos;

class SeminarioModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_seminario_crud(?,?,?,?,?,?,?,?,?,?,?,?,?)','Seminario');
	}
	
}
