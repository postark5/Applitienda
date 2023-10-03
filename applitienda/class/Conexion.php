<?php

class Conexion
{
	public static function db_connect()
	{
		$mysqli= new mysqli("localhost","root","");
		$mysqli->select_db("bdgestion");

		return $mysqli;
	}
}
?>