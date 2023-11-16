<?php
namespace modelos;

class PsicologiaModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_psicologia_crud(?,?,?,?,?,?,?,?,?,?,?)','Psicologia');
	}

    function obtenerInformesXalumno($objeto)  {
        $objeto->opcion=6;
		$respuesta=$this->queryTabla($this->sp,$objeto);
		if($respuesta->respuesta){
			$respuesta->resultado->pagina=1;
		}
		return $respuesta;
    }

}
