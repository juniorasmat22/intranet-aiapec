<?php
namespace modelos;

class RegistroConcursoModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_registroconcurso_crud(?,?,?,?,?,?,?,?,?,?,?)','RegistroConcurso');
	}

	public function get_estudiantes_por_concurso($entidad) {
		$entidad->opcion = 7;
        return $this->queryObjects($this->sp, $entidad);
	}
	 public function update_estado($entidad){
		$entidad->opcion=8;
		return $this->noQuery($this->sp,$entidad);
	 }

	 public function get_concursos_por_estudiante($entidad)
	 {
		 $entidad->opcion = 6;
		 return $this->queryObjects($this->sp, $entidad);
	 }

}
