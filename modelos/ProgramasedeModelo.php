<?php
namespace modelos;

class ProgramasedeModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_programasede_crud(?,?,?,?,?)','Programasede');
	}
	
	public function get_sede_por_programa($entidad){
		$entidad->opcion = 6;
        return $this->queryObjects($this->sp, $entidad);
	}
}
