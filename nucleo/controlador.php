<?php
namespace controladores;
class Controlador
{
	public $modelo;
	public $entidad;
    public $vista;

	public function __construct($modelo,$entidad,$vista)
	{
      $claseModelo='modelos\\'.$modelo;
      $claseEntidad='entidades\\'.$entidad;
      if(class_exists($claseModelo))
		$this->modelo=new $claseModelo;

      if(class_exists($claseEntidad))
        $this->entidad=new $claseEntidad;

      $this->vista=$vista;
   }

	public function index(){
        $pagina=isset($_GET['p'])?$_GET['p']:1;
        $respuesta=$this->modelo->listar($pagina);
		$vista=$this->vista;
		require_once 'vistas/plantilla/index.php';
	}
	public function crear(){
        $this->entidad->setMetodoPost();
        $respuesta=$this->modelo->crear($this->entidad);
        $this->respuesta($respuesta);
	}
	public function editar(){
        $this->entidad->setMetodoPost();
        $respuesta=$this->modelo->editar($this->entidad);
        $this->respuesta($respuesta);
	}
	public function eliminar(){
        $this->entidad->setMetodoGet();
        $respuesta=$this->modelo->eliminar($this->entidad);
        $this->respuesta($respuesta);
	}
	public function listar(){
        $pagina=isset($_GET['p'])?$_GET['p']:1;
        $respuesta=$this->modelo->listar($pagina);
        $this->respuesta($respuesta);
    }

    public function buscar(){
        $this->entidad->setMetodoGet();
        $pagina=isset($_GET['p'])?$_GET['p']:1;
        $respuesta=$this->modelo->buscar($this->entidad,$pagina);
        $vista=$this->vista;
        require_once 'vistas/plantilla/index.php';
    }

    public function get(){
        $this->entidad->setMetodoGet();
        $respuesta=$this->modelo->get($this->entidad);
        $this->respuesta($respuesta);
    }

    public function respuesta($respuesta){
        echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
    }
}
