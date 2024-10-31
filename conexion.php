<?php

class conexionweb
{
	const user='root';
	const pass='1234';
	const db='base_datos_sindoni';
	const servidor='localhost';

	public function conectardb2()
	{
		$conectar = new mysqli(self::servidor,self::user,self::pass,self::db);

		if ($conectar->connect_errno)
		{
			die("error en la conexion".$conectar->connect_error);
		}
		return $conectar;
	}
}

?>