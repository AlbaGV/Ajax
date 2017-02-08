<?php



error_reporting(E_ALL ^ E_NOTICE);//Que me notifique de todos los errores menso de la notice
require_once '../Modelo/Contenido.php';


$perro_Anadir = new Contenido("",$_POST[fechaAltaNuevo],$_POST[nombreNuevo],$_POST[duenoNuevo],$_POST[razaNuevo]);

$perro_Anadir->insert();
