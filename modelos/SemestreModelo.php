<?php
namespace modelos;

class SemestreModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_semestre_crud(?,?,?,?,?,?,?,?)','Semestre');
	}


}
