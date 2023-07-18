<?php
namespace nucleo;
class Tabla
{
	public $objetos;
	public $paginas;
	public $pagina;
	function __construct($objetos,$paginas,$pagina=1)
	{
		$this->objetos=$objetos;
		$this->paginas=$paginas;
		$this->pagina=$pagina;
	}
}
