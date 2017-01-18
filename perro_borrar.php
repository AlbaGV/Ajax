<?php
include "conexion.php";


$consulta ="DELETE FROM perro 
			WHERE idperro = ". $_GET["idperro"];
		
$conexion->exec($consulta);

