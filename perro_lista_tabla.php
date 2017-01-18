<?php
include "conexion.php";

//Solo en el caso de que se pulse para buscar por idtipo se duerme un segundo el servidor
if (!empty($_POST["idraza"])  && empty($_POST["idperro"]) ) sleep(1);

//Constante con el número de regitros por página:
$numregxpagina=2;
$paginaactual=1;

//En caso de que no me llegen parámetros de paginación
//Inicializamos valores de la paginación como página 1
if (empty($_GET["page"]) || ($_GET["page"]==1) ) {
	$regcomienzo = 0;
}else{
	$regcomienzo = (($_GET["page"]-1) * $numregxpagina);
	$paginaactual= $_GET["page"];
}

//Consulta general del listado de inmuebles
$consulta = "
SELECT i.idperro, i.nombre, i.dueno,i.fecha, i.idraza, t.nombreraza as nombrederaza
FROM perro i, raza t
WHERE i.idraza = t.idraza";

//Consulta en función de dirección
if (!empty($_GET["busquedaperro"])){
$consulta.= " AND i.nombre LIKE '%" . $_GET["busquedaperro"] . "%' ";
}

//Si llega el parametro ordenapor se ordena por ese campo
if (!empty($_POST["idraza"])) 
	$consulta .= " AND i.idraza=" . $_POST["idraza"];

$resultado = $conexion->query($consulta);
	
if (empty($_POST["ordenapor"])){
    $consulta .= "ORDER BY nombre";
}else{
        $direccion="";
	$ordena="";
	if ($_POST["ordenapor"]=="nombre"){ 
            $ordena = "nombre";
            if($direccion=="" || $direccion== 2){
                    
                    $consulta .= " ORDER BY " . $ordena ." ASC";
                    $direccion= 1;
            }else if($direccion== 1){
                    $consulta .= " ORDER BY " . $ordena ."  DESC";
                    $direccion= 2;
            }        
        
        $resultado = $conexion->query($consulta);
        print $consulta;
        print $direccion;
        }
    }
//LIMIT PARA PAGINACION
$limit = " LIMIT ". $regcomienzo . "," . $numregxpagina;


$resultado3 = $conexion->query($consulta . $limit);
	
?>
      


		
<table id="tabladatos" align="center" >
<thead>    
<tr align="center">
	<th class="ordena" name="nombre">Nombre Perro</th>
        <th>Nombre dueño</th> 
        <th>Fecha</th> 
	<th>Raza</th>
	 
    <th>Acciones</th>                              
</tr>
</thead>
<tbody>
<?php 	
while ($fila = $resultado->fetchObject()){?>
<tr id="perro_<?=$fila->idperro?>" align="center" data-idperro="<?=$fila->idperro?>">
		<td class="nombre"><?=$fila->nombre?></td>
                <td class="dueno"><?=$fila->dueno?></td>
                <td class="fecha"><?=$fila->fecha?></td>
        <td class="idraza" name="<?=$fila->idraza?>"><?=$fila->nombrederaza?></td>
        <td> <img class="borrar" src="img/borrar.png" width="20" height="20" alt="Borrar">
    &nbsp;<img class="modificar" src="img/lapiz.png" width="20" height="20" alt="Modificar">
   	</td>
</tr>
<?php }//while ?>
</tbody>
</table>
<style>
ul.pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
}

ul.pagination li {display: inline;}

ul.pagination li a {
    color:black;
	float: left;
    padding: 8px 16px;
    text-decoration: none;
}
.actual{
	color:red !important;
}
</style>

<ul class="pagination">
<?php 
if ($paginaactual!=1){?>
  <li><a href="#" data-page="1">Primero</a></li>
  <li><a href="#" data-page="<?php echo ($paginaactual-1)?>"><<</a></li>
<?php
}?>
<?php
//Cuantas páginas

$resultado4 = $conexion->query('SELECT COUNT(*) FROM perro');
$numpaginas=intval($resultado/ $numregxpagina)+1;
for ($i=1;$i<=$numpaginas;$i++){ ?>  
  <li><a href="#" data-page="<?php echo $i?>" 
  <?php
if ($i==$paginaactual){?> class="actual" <?php }?>
  ><?php echo $i?></a></li>
<?php } ?>
<?php 
if ($paginaactual!=$numpaginas){?>
  <li><a href="#" data-page="<?php echo ($paginaactual+1)?>">>></a></li>
  <li><a href="#" data-page="<?php echo $numpaginas?>">Ultimo</a></li>
<?php }?>
</ul>
<?php //} //if  ?>
