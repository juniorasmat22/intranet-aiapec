<?php
namespace modelos;

class CursoseminarioModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_cursoseminario_crud(?,?,?,?,?,?,?,?,?,?)','Cursoseminario');
	}
	
	public function get_cursos_por_seminario($entidad) {
		$entidad->opcion = 6;
        return $this->queryObjects($this->sp, $entidad);
	}
	
}
