<?php
namespace modelos;

class EstudiantepreModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_estudiantepre_crud(?,?,?,?,?,?)','Estudiantepre');
	}

	
}
