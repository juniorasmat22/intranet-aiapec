<?php
namespace modelos;

class CursoModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_curso_crud(?,?,?,?,?)','Curso');
	}
	
	
}
