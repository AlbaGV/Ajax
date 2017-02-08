<?php if (!empty($_POST["idraza"])  && empty($_POST["idperro"]) ) sleep(1); ?>
  <table  class="table table-bordered" id="tabladatos">
    <tr>
      <th id="i">ID</th>
      <th id="f">Fecha Alta</th>
      <th id="t">Nombre perro</th>
       <th id="t">Nombre dueño</th>
      <th id="s">Raza</th> 
  
     
      <th colspan="2">Acciones</th>

    </tr>
    <?php
    
    foreach ($data['listado'] as $perros) {
      ?>
      <tr id="perro_<?= $perros->getId() ?>" align="center" data-idperro="<?= $perros->getId() ?>">

        <td class="id"><?= $perros->getId() ?></td>
        <td class="alta"><?= $perros->getFechaAlta() ?></td>
        <td class="nombre"><?= $perros->getNombre() ?></td>
        <td class="dueno"><?= $perros->getDueno() ?></td>
        <td class="idraza" name="<?=$perros->getRaza()?>"><?=$perros->getNombredeRaza()?></td>
       
       
        <td class="accion"> <button id="borrar" type="button" class="btn btn-danger">Borrar</button>
           &nbsp; <button id="modificar" type="button" class="btn btn-warning" >Cambiar</button></td>

      </tr>


      <?php
    }
    ?>
  </table>
  <div class="table-pagination pull-right">
    <?php echo  paginate($reload, $page, $total_pages, $adjacents,$o,$p); ?>
  </div>

  

