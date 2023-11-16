<?php
namespace entidades;
use PDO;
class Participante extends Entidad
{
	public $idParticipante;
	public $tipodocumentoParticipante;
	public $numerodocumentoParticipante;
	public $nombresParticipante;
	public $apellidosParticipante;
	public $idGrado;
	public $codigoParticipante;
	public $correoParticipante;
	public $celularParticipante;
	public $dniApoderadoParticipante;
	public $nombresApoderadoParticipante;
	public $apellidosApoderadoParticiante;
    public $celularApoderadoParticipante;
	public $correoApoderadoParticipante;
	public $colegioParticipante;
	public $tipoColegioParticipante;
	public $tipoRegistroParticipante; // si fue individual o por delegación
    public $idAsesor;
    public $fechaRegistroParticipante;



	public function setConsulta($filaConsulta){
		$this->idParticipante=$this->obtenerColumna($filaConsulta,'id_participante');
		$this->tipodocumentoParticipante=$this->obtenerColumna($filaConsulta,'tipodocumento_participante');
		$this->numerodocumentoParticipante=$this->obtenerColumna($filaConsulta,'numerodocumento_participante');
		$this->nombresParticipante=$this->obtenerColumna($filaConsulta,'nombres_participante');
		$this->apellidosParticipante=$this->obtenerColumna($filaConsulta,'apellidos_participante');
		$this->idGrado=$this->obtenerColumna($filaConsulta,'id_grado');
		$this->codigoParticipante=$this->obtenerColumna($filaConsulta,'codigo_participante');
		$this->correoParticipante=$this->obtenerColumna($filaConsulta,'correo_participante');
		$this->celularParticipante=$this->obtenerColumna($filaConsulta,'celular_participante');
		$this->dniApoderadoParticipante=$this->obtenerColumna($filaConsulta,'dni_apoderado_participante');
		$this->nombresApoderadoParticipante=$this->obtenerColumna($filaConsulta,'nombres_apoderado_participante');
		$this->apellidosApoderadoParticiante=$this->obtenerColumna($filaConsulta,'apellidos_apoderado_participante');
		$this->celularApoderadoParticipante=$this->obtenerColumna($filaConsulta,'correo_apoderado_participante');
		$this->correoApoderadoParticipante=$this->obtenerColumna($filaConsulta,'celular_apoderado_participante');
		$this->colegioParticipante=$this->obtenerColumna($filaConsulta,'colegio_participante');
		$this->tipoColegioParticipante=$this->obtenerColumna($filaConsulta,'tipo_colegio_participante');
		$this->tipoRegistroParticipante=$this->obtenerColumna($filaConsulta,'tipo_registro_participante');
		$this->idAsesor=$this->obtenerColumna($filaConsulta,'id_asesor');
		$this->fechaRegistroParticipante=$this->obtenerColumna($filaConsulta,'fecha_registro_participante');
		
	}
	public function bindValues($statement){
		$statement->bindValue(1,$this->idParticipante,PDO::PARAM_INT);
		$statement->bindValue(2,$this->tipodocumentoParticipante,PDO::PARAM_STR);
        $statement->bindValue(3,$this->numerodocumentoParticipante,PDO::PARAM_STR);
        $statement->bindValue(4,$this->nombresParticipante,PDO::PARAM_STR);
        $statement->bindValue(5,$this->apellidosParticipante,PDO::PARAM_STR);
        $statement->bindValue(6,$this->idGrado,PDO::PARAM_INT);
        $statement->bindValue(7,$this->codigoParticipante,PDO::PARAM_STR);
        $statement->bindValue(8,$this->correoParticipante,PDO::PARAM_STR);
        $statement->bindValue(9,$this->celularParticipante,PDO::PARAM_STR);
        $statement->bindValue(10,$this->dniApoderadoParticipante,PDO::PARAM_STR);
        $statement->bindValue(11,$this->nombresApoderadoParticipante,PDO::PARAM_STR);
        $statement->bindValue(12,$this->apellidosApoderadoParticiante,PDO::PARAM_STR);
        $statement->bindValue(13,$this->celularApoderadoParticipante,PDO::PARAM_STR);
        $statement->bindValue(14,$this->correoApoderadoParticipante,PDO::PARAM_STR);
        $statement->bindValue(15,$this->colegioParticipante,PDO::PARAM_STR);
        $statement->bindValue(16,$this->tipoColegioParticipante,PDO::PARAM_STR);
        $statement->bindValue(17,$this->tipoRegistroParticipante,PDO::PARAM_STR);
        $statement->bindValue(18,$this->idAsesor,PDO::PARAM_STR);
        $statement->bindValue(19,$this->fechaRegistroParticipante,PDO::PARAM_STR);
		$statement->bindValue(20,$this->opcion,PDO::PARAM_INT);
		$statement->bindValue(21,$this->pagina,PDO::PARAM_INT);

		return $statement;
	}

	public function set($metodo){
		$this->idParticipante	 = $metodo('idParticipante');
		$this->tipodocumentoParticipante      = $metodo('tipodocumentoParticipante');
        $this->numerodocumentoParticipante      = $metodo('numerodocumentoParticipante');
        $this->nombresParticipante      = $metodo('nombresParticipante');
        $this->apellidosParticipante      = $metodo('apellidosParticipante');
        $this->idGrado      = $metodo('idGrado');
        $this->codigoParticipante      = $metodo('codigoParticipante');
        $this->correoParticipante      = $metodo('correoParticipante');
        $this->celularParticipante      = $metodo('celularParticipante');
        $this->dniApoderadoParticipante      = $metodo('dniApoderadoParticipante');
        $this->nombresApoderadoParticipante      = $metodo('nombresApoderadoParticipante');
        $this->apellidosApoderadoParticiante      = $metodo('apellidosApoderadoParticiante');
        $this->celularApoderadoParticipante      = $metodo('celularApoderadoParticipante');
        $this->correoApoderadoParticipante      = $metodo('correoApoderadoParticipante');
        $this->colegioParticipante      = $metodo('colegioParticipante');
        $this->tipoColegioParticipante      = $metodo('tipoColegioParticipante');
        $this->tipoRegistroParticipante      = $metodo('tipoRegistroParticipante');
        $this->idAsesor      = $metodo('idAsesor');
	}

}
