<?php
namespace modelos;

class ReporteAsistenciaModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_reporte_asistencia_crud(?,?,?,?,?,?,?,?)','ReporteAsistencia');
	}

	public function obtenerDatosAsistencia($entidad){
		$entidad->opcion = 2;
        return $this->queryObjeto($this->sp, $entidad);
	}


}
