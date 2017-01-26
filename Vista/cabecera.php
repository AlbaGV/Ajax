<!DOCTYPE html>
<h3 align="center">Listado Perros
	<span id="carga"><img src="img/ajax-loader.gif" id="cargando" /></span>
<select id="idraza">
<option value="">------</option>
<?php
$consulta2 = "SELECT idraza, nombreraza 
			FROM raza
			ORDER BY nombreraza";
$resultado2 = $conexion->query($consulta2);
while ($fila2 = $resultado2->fetchObject()){?>
<option value="<?=$fila2->idraza?>" 
<?php if (!empty($_POST["idraza"]) && $_POST["idraza"]==$fila2->idraza) echo ' selected="selected" '?>
><?=$fila2->nombreraza?></option>
<?php } ?>
</select>
<input id="filtrar" type="button" value="filtrar" />
<img src="img/nuevo.png" width="20" height="20" id="nuevo" title="Nuevo Perro">
</h3>
<h3 align="center">Buscar perro<input type="text" id="buscaperro" value=""></h3>