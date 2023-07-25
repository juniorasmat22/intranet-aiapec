<?php
namespace modelos;

class MatriculaModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_matricula_crud(?,?,?,?,?,?,?,?,?,?,?,?)','Matricula');
	}
	
 
}
