<?php
namespace modelos;

class SedeModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_sede_crud(?,?,?,?)','Sede');
	}


}
