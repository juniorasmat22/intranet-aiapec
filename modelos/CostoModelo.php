<?php
namespace modelos;

class CarreraModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_costo_crud(?,?,?,?,?,?)','Costo');
	}
	

}
