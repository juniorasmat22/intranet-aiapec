<?php

namespace modelos;

use PDO;

class AulaModelo extends Modelo {
    public function __construct(){
        parent::__construct('sp_aula_crud(?,?,?,?,?,?,?,?,?,?)', 'Aula');
    }

    public function listarAulas($objeto,$pagina=1){
		$objeto->opcion=4;
		$objeto->pagina=$pagina;
		$respuesta=$this->queryTabla($this->sp,$objeto);
		if($respuesta->respuesta){
			$respuesta->resultado->pagina=$pagina;
		}
		return $respuesta;
	}
	
	public function get_aula_matricula($objeto) {
		$objeto->opcion=6;
		return $this->queryObjeto($this->sp,$objeto);
	}
}

?>
