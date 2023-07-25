<?php
namespace modelos;

class ProgramasedeModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_programasede_crud(?,?,?,?,?)','Programasede');
	}
	
}
