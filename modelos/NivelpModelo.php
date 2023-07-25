<?php
namespace modelos;

class NivelpModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_nivelp_crud(?,?,?,?)','Nivelp');
	}
	
}
