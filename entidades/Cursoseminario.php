<?php
namespace entidades;
use PDO;
class Cursoseminario extends Entidad
{
	public $idCursoSeminario;
	public $fechaCursoSeminario;
    public $idSeminario;
    public $idCurso;
    public $horaInicioCursoSeminario;
    public $horaFinCursoSeminario;
    public $docenteCursoSeminario;
    public $fotoDocenteCursoSeminario;



	public function setConsulta($filaConsulta){
		$this->idCursoSeminario=$this->obtenerColumna($filaConsulta,'id_curso_seminario');
		$this->fechaCursoSeminario=$this->obtenerColumna($filaConsulta,'fecha_curso_seminario');
		$this->idSeminario=$this->obtenerColumna($filaConsulta,'id_seminario');
		$this->idCurso=$this->obtenerColumna($filaConsulta,'id_curso');
		$this->horaInicioCursoSeminario=$this->obtenerColumna($filaConsulta,'hora_inicio_curso_seminario');
		$this->horaFinCursoSeminario=$this->obtenerColumna($filaConsulta,'hora_fin_curso_seminario');
		$this->docenteCursoSeminario=$this->obtenerColumna($filaConsulta,'docente_curso_seminario');
		$this->fotoDocenteCursoSeminario=$this->obtenerColumna($filaConsulta,'foto_docente_curso_seminario');
	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->idCursoSeminario,PDO::PARAM_INT);
		$statement->bindValue(2,date("Y-m-d H:i:s", strtotime($this->fechaCursoSeminario)), PDO::PARAM_STR);
        $statement->bindValue(3,$this->idSeminario,PDO::PARAM_INT);
		$statement->bindValue(4,$this->idCurso,PDO::PARAM_INT);
		$statement->bindValue(5,date("H:i:s", strtotime($this->horaInicioCursoSeminario)), PDO::PARAM_STR);
		$statement->bindValue(6,date("H:i:s", strtotime($this->horaFinCursoSeminario)), PDO::PARAM_STR);
		$statement->bindValue(7,$this->docenteCursoSeminario,PDO::PARAM_STR);
		$statement->bindValue(8,$this->fotoDocenteCursoSeminario,PDO::PARAM_STR);
		$statement->bindValue(9,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(10,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idCursoSeminario	 = $metodo('idCursoSeminario');
		$this->fechaCursoSeminario      = $metodo('fechaCursoSeminario');
		$this->idSeminario      = $metodo('idSeminario');
		$this->idCurso      = $metodo('idCurso');
		$this->horaInicioCursoSeminario      = $metodo('horaInicioCursoSeminario');
		$this->horaInicioCursoSeminario      = $metodo('horaInicioCursoSeminario');
		$this->docenteCursoSeminario      = $metodo('docenteCursoSeminario');
		$this->fotoDocenteCursoSeminario      = $metodo('fotoDocenteCursoSeminario');
	}

}
