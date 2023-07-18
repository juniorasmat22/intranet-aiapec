<?php
class Cargador
{
	public static function cargar(){
		$base = __DIR__ . '/';
		$folders = ['solicitud','nucleo','entidades','modelos','controladores'];
		foreach($folders as $f){
		    foreach (glob($base . "$f/*.php") as $filename){
				require $filename;
		    }
		}
	}
}
