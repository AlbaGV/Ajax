<?php
# conecta a la base de datos
//si accion esta definido y no esta null coje el valor sino ponerlo vacio
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
//Recojo el paramentro enviado por ajax Para ordenar
$o = (isset($_REQUEST['ordenar']) && $_REQUEST['ordenar'] != NULL) ? $_REQUEST['ordenar'] : '1';
$p=(isset($_REQUEST['forma']) && $_REQUEST['forma'] != NULL) ? $_REQUEST['forma'] : 'ASC';
 require_once '../Modelo/Contenido.php';
//si es igual a ajax
if ($action == 'ajax') {
  // Obtiene todas las propiedades
  $data['listado'] = Contenido::getListPerro($o,$p);
  include '../Modelo/listadoPag.php';

  include '../Vista/listado.php';
  ?>

<?php
} else {
  ?>
  <div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4>Aviso!!!</h4> No hay datos para mostrar
  </div>
  <?php
}
?>