<?php

class conexionweb2
{
	const user='root';
	const pass='Mtto2023';
	const db='id19420026_basedatos3';
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