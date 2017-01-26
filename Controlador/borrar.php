<?php

require_once '../Modelo/Contenido.php';
$perro_borrar = new Contenido($_GET['idperro']);
$perro_borrar->delete();
