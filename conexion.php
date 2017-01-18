<?php
require_once("constantes.php");

try {
      $conexion = new PDO("mysql:host=".HOST.";dbname=".NOMBRE_DB.";charset=utf8", USUARIO_DB, CLAVE_DB);
} catch (PDOException $e) {
      echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
      die ("Error: " . $e->getMessage());
}

?>