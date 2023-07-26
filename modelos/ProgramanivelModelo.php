<?php
namespace modelos;

class ProgramanivelModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_programanivel_crud(?,?,?,?,?,?)','Programanivel');
	}
	
	public function get_niveles_por_programa($entidad){
		$entidad->opcion = 6;
        return $this->queryObjects($this->sp, $entidad);
	}
}
