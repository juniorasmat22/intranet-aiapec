<?php
namespace modelos;

class UsuarioModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_usuario_crud(?,?,?,?,?,?,?)','Usuario');
	}

	public function login($usuario){
		$usuario->opcion = 6;
		return $this->queryObjeto($this->sp,$usuario);
	}
}
