<?php
namespace modelos;

class ConcursoModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_concurso_crud(?,?,?,?,?,?,?,?,?,?,?,?,?)','Concurso');
	}
	
}
