<?php
namespace modelos;

class ParticipanteModelo extends Modelo{
	public function __construct(){
		parent::__construct('sp_participante_crud(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)','Participante');
	}
	
	
}
