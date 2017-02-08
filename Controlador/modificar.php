<?php

error_reporting(E_ALL ^ E_NOTICE); //Que me notifique de todos los errores menso de la notice
// Conexión a la base de datos
require_once '../Modelo/Contenido.php';

$originalDate = "$_POST[fechaAltaModificar]"; //Cambio el formato de la fecha para que se pueda almacenar el BD
$newDate = date("Y-m-d", strtotime($originalDate));

$perro_Modificar = new Contenido($_POST[idModificar], $newDate, $_POST[nombreModificar],$_POST[duenoModificar], $_POST[razaModificar]);

$perro_Modificar->update();

