<?php include "conexion.php"?>
<tr id="filanueva" align="center">
<td>
<input  placeholder="Nombre Perro" type="text" id="nombrenuevo" value="">
</td>
<td>
<input  placeholder="Nombre Dueño" type="text" id="duenonuevo" value="">
</td>
<td>
<input  placeholder="Fecha" type="text" id="fechanuevo" value="">
</td>
<td>
<select placeholder="Raza" id="idrazanuevo">
<?php
$consulta2 = "SELECT idraza, nombreraza 
			FROM raza
			ORDER BY nombreraza";
$resultado2 = $conexion->query($consulta2);
while ($fila2 = $resultado2->fetchObject()){?>
<option value="<?php echo $fila2->idraza?>"><?php echo $fila2->nombreraza?></option>
<?php } //while ?>
</select>
</td>
<td>
<img id="guardarnuevo" src="img/floppy.png" width="20" height="20" alt="Guardar">
&nbsp;&nbsp;
<img id="cancelarnuevo" src="img/borrar.png" width="20" height="20" alt="Cancelar">

</td>
</tr>