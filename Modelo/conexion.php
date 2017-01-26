<?php
abstract class canino {
  private static $server = 'localhost';
  private static $db = 'canino';
  private static $user = 'root';
  private static $password = 'root';

  public static function conectar() {
    try {
      $connection = new PDO("mysql:host=".self::$server.";dbname=".self::$db.";charset=utf8", self::$user, self::$password);
    } catch (PDOException $e) {
      echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
      die ("Error: " . $e->getMessage());
    }
 
    return $connection;
  }
}