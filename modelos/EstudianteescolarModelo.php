<?php
namespace modelos;

class EstudianteescolarModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_estudianteescolar_crud(?,?,?,?,?,?,?,?)','Estudianteescolar');
	}	
}
