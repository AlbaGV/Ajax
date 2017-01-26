<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto Con Ajax</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript" src="ajax.js"></script>
    <link href="../Vista/Style_Admin/Css.css" rel="stylesheet">
   
    <style>
      .dialogo{ display: none; }
      table{text-align: center;}
      #seleccion,h4{
        float: right;
        margin-top: 10px;
        margin-right: 10px;
      }
      
    
    </style>
  </head>
  <body>
     <h1>Residencia canina</h1>
     <!--<h4 align="center">Direcci&oacute;n<input type="text" id="buscadireccion" value=""></h4>-->
    <div id="seleccion"> <b>Order By</b>  <select name="campos" id="campos">
      <option value="1">Id</option>
      <option value="2">Fecha</option>
      <option value="7">Raza</option>
     
      <option value="5">Nombre</option>
      <option value="3">Nombre del dueño</option>

    </select>
      <select name="forma" id="forma">
      <option value="ASC">Asc</option>
      <option value="DESC">Desc</option>
   
    </select></div>
   

    <div class="container-fluid">
     
      <div style="cursor:pointer; width:30px; "><img src="../Vista/img/nuevo.png" width="30" height="30" id="nuevo" title="Nuevo Perro"></div>

      <hr>

      <div class="row">
        <div class="col-xs-12">

          <div id="loader" class="text-center"> </div>
          <div class="outer_div"></div><!-- Datos ajax Final -->
        </div>

      </div>

      <!-- CAPA DE DIALOGO Borrar INMUEBLE -->
      <div id="dialogoborrar" class="dialogo" title="Eliminar Perro">
        <p>¿Esta seguro que desea eliminar los datos del perro?</p>
      </div>
       <?php
     require_once '../Modelo/Raza.php';
     $data['listadoRaza'] = Raza::getListRaza();
     
     ?>
      <!-- CAPA DE DIALOGO MODIFICAR INMUEBLE -->
      <div id="dialogomodificar" class="dialogo" title="Modificar Perro">
        <?php include "../Vista/perro_formulario_modificar.php";
        ?>
      </div>
      
      <!-- CAPA DE DIALOGO NUEVO INMUEBLE -->
      <div id="dialogonuevo" class="dialogo" title="Nuevo Perro">
        <?php include "../Vista/formulario_nuevos.php";
        ?>
      </div>

    </div>
    <script>

    </script>
  </body>
</html>
