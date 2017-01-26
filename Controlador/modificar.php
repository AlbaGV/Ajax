<?php

error_reporting(E_ALL ^ E_NOTICE); //Que me notifique de todos los errores menso de la notice
// Conexión a la base de datos
require_once '../Modelo/Contenido.php';
//$img = $_FILES["imagen"]["name"];
//move_uploaded_file($_FILES["imagen"]["tmp_name"], "interfaz_usuario/imagen/" . $img);
//,$_POST[$img]

$originalDate = "$_POST[fechaAltaModificar]"; //Cambio el formato de la fecha para que se pueda almacenar el BD
$newDate = date("Y-m-d", strtotime($originalDate));
//echo "$newDate ". " Esta es la fecha <br>"; 
//$img=" ";
$perro_Modificar = new Contenido($_POST[idModificar], $newDate, $_POST[nombreModificar],$_POST[duenoModificar], $_POST[razaModificar]);
//echo "Este es el vendedor $_POST[vendedorModificar] <br>";
$perro_Modificar->update();

