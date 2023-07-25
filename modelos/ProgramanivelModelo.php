<?php
namespace modelos;

class ProgramanivelModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_programanivel_crud(?,?,?,?,?,?)','Programanivel');
	}
	
}
