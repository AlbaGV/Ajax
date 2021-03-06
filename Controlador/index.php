<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Residencia Ajaxnina</title>
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
     
     <div id="seleccion"> <b style="font-size: 30px; color:#5c3919">Ordenar por</b>  <select name="campos" id="campos">
      <option value="1">Id</option>
      <option value="5">Fecha</option>
      
     
      <option value="4">Nombre</option>
      <option value="2">Nombre del dueño</option>

    </select>
      <select name="forma" id="forma">
      <option value="ASC">Asc</option>
      <option value="DESC">Desc</option>
   
    </select></div>
    
   

    <div class="container-fluid">
     
      <div style="cursor:pointer; width:30px; "><img src="../Vista/img/Doge.png" width="50" height="50" id="nuevo" title="Nuevo Perro"></div>

      <hr>

      <div class="row">
        <div class="col-xs-12">

          <div id="loader" class="text-center"> </div>
          <div class="outer_div"></div><!-- Datos ajax Final -->
        </div>

      </div>

      
      <div id="dialogoborrar" class="dialogo" title="Eliminar Perro">
        <p>¿Esta seguro que desea eliminar los datos del perro?</p>
      </div>
       <?php
     require_once '../Modelo/Raza.php';
     $data['listadoRaza'] = Raza::getListRaza();
     
     ?>
   
      <div id="dialogomodificar" class="dialogo" title="Modificar Perro">
        <?php include "../Vista/perro_formulario_modificar.php";
        ?>
      </div>
      
      
      <div id="dialogonuevo" class="dialogo" title="Nuevo Perro">
        <?php include "../Vista/formulario_nuevos.php";
        ?>
      </div>

    </div>
    <script>

    </script>
  </body>
</html>
