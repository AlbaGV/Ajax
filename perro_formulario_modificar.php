<form id="formulario">
Nombre Perro:<input type="text" id="nombremodificar" value=""><br>
Nombre Dueño:<input type="text" id="duenomodificar" value=""><br>
Fecha:<input type="text" id="fechamodificar" value=""><br>
Raza:<select id="idrazamodificar">
<?php
$consulta2 = "SELECT idraza, nombreraza 
			FROM raza
			ORDER BY nombreraza";
$resultado2 = $conexion->query($consulta2);
while ($fila2 = $resultado2->fetchObject()){?>
<option value="<?= $fila2->idraza?>"><?= $fila2->nombreraza?></option>
<?php } ?>
</select>
<br>

</form>
