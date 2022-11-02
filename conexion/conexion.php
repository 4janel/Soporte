<?php 

	$servidor="mysql:dbname=empresa;host=localhost:3307";
	$usuario="root";
	$clave="";

	try {
		$pdo= new PDO($servidor,$usuario,$clave);
		//echo "conectado...";
	} catch (PDOException $e) {
		echo "error de conexion...".$e->getMessage();
	}

 ?>