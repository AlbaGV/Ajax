<?php
include "conexion.php";


if (!empty($_POST["nombre"]))
{
    
    $consulta3 = "SELECT count(*) as cnt  FROM perro WHERE nombre = '" . $_POST["nombre"] . "'";
    print_r($consulta3);
	
    $qry_res = $conexion->query($consulta3);
	$res = $qry_res->fetchObject();

if($res['cnt']==0){
		echo(json_encode(true)); 
    }
    else
    {
        echo(json_encode(false)); //already registered
    }
}
else
{
    echo(json_encode(false)); //invalid post var
}
 