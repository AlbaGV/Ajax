<?php 
include "conexion.php";

$consulta = "UPDATE perro SET
			nombre = '" . $_POST["nombremodificar"] ."',
			dueno = '" . $_POST["duenomodificar"] . "',
                        fecha = '" . $_POST["fechamodificar"] . "',    
			idraza = " . $_POST["idrazamodificar"] . " 
			WHERE idperro = " . $_POST["idperromodificar"];


$conexion->exec($consulta);


include "perro_lista_tabla.php";
?>
