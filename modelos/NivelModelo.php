<?php
namespace modelos;

class NivelModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_nivel_crud(?,?,?,?)','Nivel');
	}
	
}
