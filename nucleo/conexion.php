<?php

namespace nucleo;

use PDO;
use PDOException;

class Conexion
{
	public static function getConexion()
	{
		$servidor = "127.0.0.1";
		$db = "db_academia_aiapaec";
		$usuario = "root";
		$clave = "";

		
		// $servidor = "academiaaiapaec.edu.pe";
		// $db = "ewgcgdaj_db_academia_aiapaec";
		// $usuario = "ewgcgdaj_user_academia_aiapaec"; //root
		// $clave = "SzR)HqCaFi&h";
		try {
			$con = new PDO("mysql:host=$servidor;dbname=$db", $usuario, $clave);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$con->exec("set character set utf8");
		} catch (PDOException $e) {
			die('Falló la conexión' . $e->getMessage());
		}
		return $con;
	}
	public static function callStoredProcedure($sp, $entidad)
	{
		$con = Conexion::getConexion();
		$statement = $con->prepare($sp);
		$statement = $entidad->bindValues($statement);
		$con = null;
		$statement->execute();
		return $statement;
	}
}
