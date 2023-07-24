<?php
namespace modelos;

class TemaseminarioModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_temaseminario_crud(?,?,?,?,?,?)','Temaseminario');
	}
	
	public function get_temas_por_curso($entidad) {
		$entidad->opcion = 6;
        return $this->queryObjects($this->sp, $entidad);
	}
}
