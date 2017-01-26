<?php


class Contenido {

  private $idperro;
  private $fecha;
  private $nombre;
  private $dueno;
  private $idraza;
  private $nombrederaza;
 
 

  //, $fecha_alta, $tipo, $operacion, $provincia, $superficie, $precio, $imagen, $vendedor
  function __construct($idperro, $fecha,$nombre,$dueno,$idraza, $nombrederaza) {
    $this->idperro = $idperro;
    $this->fecha = $fecha;
    $this->nombre = $nombre;
    $this->dueno = $dueno;
    $this->idraza = $idraza;
    $this->nombrederaza = $nombrederaza;

   
  }

  public function getId() {
    return $this->idperro;
  }

  public function getFechaAlta() {
    return $this->fecha;
  }

  public function getRaza() {
    return $this->idraza;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function getDueno() {
    return $this->dueno;
  }

  public function getNombredeRaza() {
    return $this->nombrederaza;
  }

  

//Inserto una fila
  public function insert() {
    require_once 'conexion.php';
    $conexion = canino::conectar();
    $insercion = "INSERT INTO perro (idperro,nombre,dueno,idraza,fecha) "
            . "VALUES (\"" . $this->idperro . "\", \"" .$this->nombre . "\", \"" . $this->dueno . "\", \"" . $this->idraza . "\", \"" . $this->fecha . "\")";

    //echo $insercion;

    $conexion->exec($insercion);
  }

//Modifico el inmueble
  public function update() {
    require_once 'conexion.php';
    $conexion = canino::conectar();

    $modificacion = "UPDATE perro SET  idperro=\"$this->idperro\",fecha=\"$this->fecha\",nombre=\"$this->nombre\",dueno=\"$this->dueno\",idraza=\"$this->idraza\" WHERE idperro=\"$_POST[idModificar]\"";
    echo $modificacion. " Esta es la consulta"; 
    $conexion->exec($modificacion);
  }

//Borro las filas
  public function delete() {
    require_once 'conexion.php';
    $conexion = canino::conectar();
    $borrado = "DELETE FROM perro WHERE idperro=" . $this->idperro;
    echo $borrado;
    $conexion->exec($borrado);
  }

  public static function cuenta() {
    require_once 'conexion.php';
    $conexion = canino::conectar();
    $count_query = $conexion->query("SELECT * FROM perro");
    //SI EXISTEN FILAS GUARDA LA CANTIDAD DE FILA
    $numrows = $count_query->rowCount();
    return $numrows;
  }

//El get que muestra la lista de los inmueble
 

  public static function getListPerro($o,$p) {
    $ordenar=$o;
    $forma=$p;
    require_once 'conexion.php';
    $conexion = canino::conectar();
    include 'pagination.php'; //incluir el archivo de paginación
    include 'listadoPag.php';
 
    $seleccion = "SELECT p.idperro,DATE_FORMAT(p.fecha,'%d/%m/%Y') as FechaAlta,p.idraza,p.nombre,p.dueno,t.nombreraza as nombrederaza  FROM perro p , raza t WHERE p.idraza = t.idraza ORDER BY  $ordenar $forma LIMIT $offset,$per_page";
    $consulta = $conexion->query($seleccion);

    $listado = [];
//Creo un nuevo objeto 
    while ($registro = $consulta->fetchObject()) {
      $listado[] = new contenido($registro->idperro, $registro-> FechaAlta, $registro->nombre, $registro->dueno, $registro->idraza, $registro->nombrederaza);
    }
   
    return $listado;
  }

}
