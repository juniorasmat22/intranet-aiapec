<?php

namespace entidades;

use PDO;

class Psicologia extends Entidad
{
    public $urlInforme;
    public $tipoInforme;
    public $idPsicologia;
    public $idEstudiante;
    public $fechaVisto;
    public $estadoInforme;

       	//variables para filtrar matriculas
	public $idProgramaAcademia;
	public $programaNivel;
	public $programaSede;
	//variables para filtrar matriculas
    public $nombre;
    public $programa;
    public $id_estudiante;

    public function setConsulta($filaConsulta)
    {
        $this->urlInforme = $this->obtenerColumna($filaConsulta, 'url_informe');
        $this->tipoInforme = $this->obtenerColumna($filaConsulta, 'tipo_informe');
        $this->idPsicologia = $this->obtenerColumna($filaConsulta, 'id_psicologia');
        $this->idEstudiante = $this->obtenerColumna($filaConsulta, 'id_estudiante');
        $this->fechaVisto = $this->obtenerColumna($filaConsulta, 'fecha_visto');
        $this->estadoInforme = $this->obtenerColumna($filaConsulta, 'estado_informe');
        $this->nombre = $this->obtenerColumna($filaConsulta, 'nombre');
        $this->programa = $this->obtenerColumna($filaConsulta, 'nombre_programa_academia');
        $this->id_estudiante = $this->obtenerColumna($filaConsulta, 'idestudiante');
    }

    public function bindValues($statement)
    {
        $statement->bindValue(1, $this->idPsicologia, PDO::PARAM_INT);
        $statement->bindValue(2, $this->idEstudiante, PDO::PARAM_INT);
        $statement->bindValue(3, $this->tipoInforme, PDO::PARAM_STR);
        $statement->bindValue(4, $this->urlInforme, PDO::PARAM_STR);
        $statement->bindValue(5, $this->estadoInforme, PDO::PARAM_STR);
        $statement->bindValue(6, date("Y-m-d H:i:s", strtotime($this->fechaVisto)), PDO::PARAM_STR);
        $statement->bindValue(7,$this->idProgramaAcademia,PDO::PARAM_STR);
        $statement->bindValue(8,$this->programaNivel,PDO::PARAM_STR);
        $statement->bindValue(9,$this->programaSede,PDO::PARAM_STR);
        $statement->bindValue(10, $this->opcion, PDO::PARAM_INT);
        $statement->bindValue(11, $this->pagina, PDO::PARAM_INT);

        return $statement;
    }

    public function set($metodo)
    {
        $this->urlInforme = $metodo('urlInforme');
        $this->tipoInforme = $metodo('tipoInforme');
        $this->idPsicologia = $metodo('idPsicologia');
        $this->idEstudiante = $metodo('idEstudiante');
        $this->fechaVisto = $metodo('fechaVisto');
        $this->estadoInforme = $metodo('estadoInforme');
        $this->idProgramaAcademia = $metodo('idProgramaAcademia');
        $this->programaNivel = $metodo('programaNivel');
        $this->programaSede = $metodo('programaSede');
        $this->id_estudiante = $metodo('id_estudiante');
    }
}
