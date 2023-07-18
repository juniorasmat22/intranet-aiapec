<?php
namespace modelos;

class AreaModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_area_crud(?,?,?,?,?,?)','Area');
	}
	
}
