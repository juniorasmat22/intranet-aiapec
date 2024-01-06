<?php

namespace modelos;

class EvaluacionModelo extends Modelo {
    public function __construct(){
        parent::__construct('sp_evaluacion_crud(?,?,?,?,?,?,?,?,?,?,?,?)', 'Evaluacion');
    }
    public function listarEvaluaciones($objeto,$pagina){
        $objeto->opcion=4;
		$objeto->pagina=$pagina;
		$respuesta=$this->queryTabla($this->sp,$objeto);
		if($respuesta->respuesta){
			$respuesta->resultado->pagina=$pagina;
		}
		return $respuesta;
    }

    public function listarEvaluacionesporTipo($objeto){
        $objeto->opcion=6;
		$respuesta=$this->queryObjects($this->sp,$objeto);
		return $respuesta;
    }
}

?>
