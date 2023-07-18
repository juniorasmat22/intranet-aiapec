<?php

namespace modelos;

use nucleo\Conexion;
use nucleo\Tabla;
use nucleo\Respuesta;
use nucleo\Request;
use PDO;
use Exception;

class Modelo{

	protected $sp; //procedimiento almacenado
	protected $claseEntidad; // nombre de la clase entidad

	protected function __construct($sp,$claseEntidad){
		$this->sp="CALL ".$sp;
		$this->claseEntidad='entidades\\'.$claseEntidad;
	}

	public function crear($objeto){
		$objeto->opcion=1;
		return $this->noQuery($this->sp,$objeto);
	}

	public function editar($objeto){
		$objeto->opcion=2;
		return $this->noQuery($this->sp,$objeto);
	}

	public function eliminar($objeto){
		$objeto->opcion=3;
		return $this->noQuery($this->sp,$objeto);
	}
	public function listar($pagina=1){
		$objeto=new $this->claseEntidad;
		$objeto->opcion=4;
		$objeto->pagina=$pagina;
		$respuesta=$this->queryTabla($this->sp,$objeto);
		if($respuesta->respuesta){
			$respuesta->resultado->pagina=$pagina;
		}
		return $respuesta;

	}
	public function buscar($objeto,$pagina=1){
		$objeto->opcion=4;
		$objeto->pagina=$pagina;
		$respuesta=$this->queryTabla($this->sp,$objeto);
		if($respuesta->respuesta){
			$respuesta->resultado->pagina=$pagina;
		}
		return $respuesta;
	}
	public function get($objeto){//obtener datos
		$objeto->opcion=5;
		return $this->queryObjeto($this->sp,$objeto);
	}
	protected function queryTabla($sp,$objeto){
		try{
			$statement=Conexion::callStoredProcedure($sp,$objeto);
			$filas=$statement->fetchAll(PDO::FETCH_ASSOC);
			$filas=array_change_key_case($filas);
			$objetos=array();
			foreach ($filas as $fila) {
				$objeto=new $this->claseEntidad;
				$objeto->setConsulta($fila);
				$objetos[]=$objeto;
			}
			$paginas=$this->paginas($statement);//nro de pagina
			$respuesta=new Respuesta(true,new Tabla($objetos,$paginas),null);
		}catch(Exception $e){
			$respuesta=new Respuesta(false,null,$e->getMessage());
		}
		return $respuesta;
	}

	protected function queryObjects($sp,$entidad)//devuelve un conjunto de datos
	{
		try{
			$statement=Conexion::callStoredProcedure($sp,$entidad);

			$filas=$statement->fetchAll(PDO::FETCH_ASSOC);
			//echo "filas..............";


			$filas=array_change_key_case($filas);
			$objetos = array();

			if(!empty($filas)){
				foreach($filas as $fila)
				{
					$objeto = new $this->claseEntidad;
					$objeto->setConsulta($fila);
					$objetos[] = $objeto;
				}
				$respuesta = new Respuesta(true, $objetos, null);
			}else{
				$respuesta=new Respuesta(false,null,null);
			}
		}catch(Exception $e){
			$respuesta = new Respuesta(false, null, $e->getMessage());
		}

		return $respuesta;
	}


	protected function queryObj($sp,$entidad,$ent)//devuelve un conjunto de datos
	{
		try{
			$statement=Conexion::callStoredProcedure($sp,$entidad);

			$filas=$statement->fetchAll(PDO::FETCH_ASSOC);
			//echo "filas..............";


			$filas=array_change_key_case($filas);
			$objetos = array();

			if(!empty($filas)){
				foreach($filas as $fila)
				{
					$objeto = new $ent;
					$objeto->setConsulta($fila);
					$objetos[] = $objeto;
				}

				$respuesta = new Respuesta(true, $objetos, null);
			}else{
				$respuesta=new Respuesta(false,null,null);
			}
		}catch(Exception $e){
			$respuesta = new Respuesta(false, null, $e->getMessage());
		}

		return $respuesta;
	}

	protected function queryObjeto($sp,$objeto){//me devuelve un objeto
		try{
			$statement=Conexion::callStoredProcedure($sp,$objeto);
			$filas=$statement->fetchAll(PDO::FETCH_ASSOC);
			$filas=array_change_key_case($filas);
         if(!empty($filas)){
				$objeto=new $this->claseEntidad;
				foreach ($filas as $fila) {
					$objeto->setConsulta($fila);
					break;
				}
				$respuesta=new Respuesta(true,$objeto,null);
			}else{
			 	$respuesta=new Respuesta(false,null,null);
			}
		}catch(Exception $e){
			$respuesta=new Respuesta(false,null,$e->getMessage());
		}
		return $respuesta;
	}
	protected function paginas($statement){
		$paginas=null;
		try{
			if($statement->nextRowset()){
				$filas=$statement->fetchAll(PDO::FETCH_ASSOC);
				$filas=array_change_key_case($filas);
				foreach ($filas as $fila) {
					$paginas=Request::obtenerColumna($fila,'paginas');
					break;
				}
			}
		}catch(Exception $e){
			throw  new Exception('Error al obtener paginación');
		}

		return $paginas;
	}
	protected function noQuery($sp,$objeto){//llama al sp y devuelve una respuesta cuando no se deveulve ningun dato
		try{

			Conexion::callStoredProcedure($sp,$objeto);
			$respuesta=new Respuesta(true,null,null);
		}catch(Exception $e){
			$respuesta=new Respuesta(false,null,$e->getMessage());
		}
		return $respuesta;
	}

}
