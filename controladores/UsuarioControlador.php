<?php

namespace controladores;

class UsuarioControlador extends Controlador
{
	public function __construct()
	{
		parent::__construct('UsuarioModelo','Usuario','vistas/usuario/index.php');
	}

	public function login(){

		if (isset($_POST['nombreUsuario'], $_POST['passwordUsuario'])){
			$this->entidad->setMetodoPost();
			$respuesta = $this->modelo->login($this->entidad);
			if($respuesta->respuesta){
				if (password_verify($_POST['passwordUsuario'],$respuesta->resultado->passwordUsuario)) {
					$respuesta->resultado->iniciarSesion();//entidad
					$this->respuesta($respuesta);
				}
				else {
					$respuesta->resultado= false;
					$respuesta->respuesta= null;
					$respuesta->mensaje = "Usuario o contraseña incorrecta!!";
					$this->respuesta($respuesta);
				}
			}else{
				$respuesta->mensaje = "El usuario no existe!!";
				$this->respuesta($respuesta);
			}
		}else{
			require_once 'vistas/login/login.php';
		}
	}
	
	
	public function cerrarSesion(){
		session_destroy();
		header('Location: index.php');
		require_once 'vistas/login/login.php';
	}

}
