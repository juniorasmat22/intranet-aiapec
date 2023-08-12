<?php
namespace modelos;

class ProgramasacademiaModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_programasacademia_crud(?,?,?,?,?,?,?,?,?,?,?)','Programasacademia');
	}
	public function get_programas_por_semestre($entidad){
		$entidad->opcion = 6;
        return $this->queryObjects($this->sp, $entidad);
	}
	public function get_programas_por_tipo($entidad){
		$entidad->opcion = 7;
        return $this->queryObjects($this->sp, $entidad);
	}

	
}
