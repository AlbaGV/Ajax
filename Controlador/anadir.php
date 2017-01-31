<?php



error_reporting(E_ALL ^ E_NOTICE);//Que me notifique de todos los errores menso de la notice
require_once '../Modelo/Contenido.php';
//  $img = $_FILES["imagen"]["name"];
// move_uploaded_file($_FILES["imagen"]["tmp_name"]["size"] > 500000, "interfaz_usuario/imagen/" . $img);
echo $_POST[fechaAltaNuevo] . "Esta es la fecha de alta";
$perro_Anadir = new Contenido("",$_POST['fechaAltaNuevo'],$_POST['nombreNuevo'],$_POST['duenoNuevo'],$_POST['razaNuevo']);

$perro_Anadir->insert();
