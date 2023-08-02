<?php
namespace controladores;

class PagoControlador extends Controlador
{

	public function __construct()
	{
		parent::__construct('PagoModelo','Pago','');
	}
	
	public function crearPago(){

		$directorio = "recursos/pagos/cuotas/";
		$archivo = $directorio . basename($_FILES["recibos"]["name"]);
		$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

		// valida que es imagen
		$checarSiImagen = getimagesize($_FILES["recibos"]["tmp_name"]);

		//var_dump($size);

		if ($checarSiImagen != false) {

			//validando tamaño del archivo
			$size = $_FILES["recibos"]["size"];

			if ($size > 5000000) {
				echo "El archivo tiene que ser menor a 500kb";
			} else {

				//validar tipo de imagen
				if ($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png") {
					// se validó el archivo correctamente
					if (move_uploaded_file($_FILES["recibos"]["tmp_name"], $archivo)) {
						//echo "El archivo se subió correctamente";
					} else {
						//echo "Hubo un error en la subida del archivo";
					}
				} else {
					//echo "Solo se admiten archivos jpg/jpeg";
				}
			}
		} else {
			//echo "El documento no es una imagen";
		}


        $this->entidad->setMetodoPost();
        $respuesta=$this->modelo->crear_pago($this->entidad);
        $this->respuesta($respuesta);
	}
}
