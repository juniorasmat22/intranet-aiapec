<?php

namespace controladores;

use EmailModel;
use entidades\Asesor;
use nucleo\Respuesta;


class ParticipanteControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('ParticipanteModelo', 'Participante', 'vistas/participantes/index.php');
	}
	
}
