<?php
namespace modelos;

class SemestreModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_semestre_crud(?,?,?,?,?,?,?,?)','Semestre');
	}

	public function get_semestre_activo($entidad) {
		$entidad->opcion = 6;
        return $this->queryObjeto($this->sp, $entidad);
	}
}
