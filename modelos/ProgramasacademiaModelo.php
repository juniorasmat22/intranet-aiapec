<?php
namespace modelos;

class ProgramasacademiaModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_programasacademia_crud(?,?,?,?,?,?,?,?)','Programasacademia');
	}
	
}
