<?php 
include "conexion.php";

$consulta = "INSERT INTO perro (nombre,dueno,idraza,fecha) 
			VALUES('" . $_POST["nombrenuevo"] ."','" . 
			$_POST["duenonuevo"] . "'," .
                        $_POST["idrazanuevo"] . ",'" . 
			$_POST["fechanuevo"] . "');";

$conexion->exec($consulta);
include "perro_lista_tabla.php";
