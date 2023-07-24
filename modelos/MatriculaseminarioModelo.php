<?php
namespace modelos;

class MatriculaseminarioModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_matricula_seminario_crud(?,?,?,?,?,?,?,?,?,?,?)','Matriculaseminario');
	}
	
   
}
