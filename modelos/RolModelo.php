<?php
namespace modelos;

class RolModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_rol_crud(?,?,?,?,?,?,?,?)','Rol');
	}


}
