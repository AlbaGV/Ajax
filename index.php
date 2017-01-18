<?php include_once "conexion.php"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Listado Perros</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css"/>       
<link rel="stylesheet" type="text/css" href="ui-lightness/jquery-ui-1.10.3.custom.css"/>
<script src="js/jquery.js"></script>
<script src="js/jquery-ui-1.12.1/jquery-ui.js"></script>
<script src="js/jquery.validate.js"></script>
	
		
<script type="text/javascript">     
$(document).ready(function() {	 
	var idraza;
	var idperro;
        var ordenadelth;
//AUTOCOMPLETADO
$(document).on("keypress keyup","#buscaperro",function(){		
	var valor= $("#buscaperro").val();
 $.get("perro_lista_tabla.php" , 
	   {
		   busquedaperro: valor 
		},
	   function(data){
			//vuelve a pintar el listado
		   $("#contenedor").html(data);
	   });//get
	
});


//---------------------------------------------------
//DIALOGO DE BORRADO
	$( "#dialogoborrar" ).dialog({
		autoOpen: false,
		resizable: false,
		modal: true,
		buttons: {
		//BOTON DE BORRAR
		"Borrar": function() {			
			//Ajax con get
			$.get("perro_borrar.php", {"idperro":idperro},function(){				
				$("#perro_" + idperro).fadeOut(500);
			})//get			
			//Cerrar la ventana de dialogo				
			$(this).dialog("close");												
		},
		"Cancelar": function() {
				//Cerrar la ventana de dialogo
				$(this).dialog("close");
		}
		}//buttons
	});	

//Evento click que pulsa el boton borrar
$(document).on("click",".borrar",function(){
	//Obtenemos el idinmueble a eliminar
	//a traves del atributo idrecord del tr
	idperro = $(this).parents("tr").data("idperro");
	//Accion para mostrar el dialogo de borrar
	 $( "#dialogoborrar" ).dialog("open");		
});


	
//---------------------------------------------------
//MODIFICAR
$( "#dialogomodificar" ).dialog({
		autoOpen: false,
		resizable: false,
		modal: true,
		buttons: {
		"Guardar": function() {			
			$.post("perro_modificar.php", {
				idperromodificar : idperro,
				nombremodificar : $("#nombremodificar").val() ,
                                duenomodificar : $("#duenomodificar").val() ,
                                fechamodificar : $("#fechamodificar").val() ,
				idrazamodificar: $("#idrazamodificar").val() ,
				idraza: $("#idraza").val() 
			},function(data,status){				
				$("#contenedor").html(data);
			})//get			
					
			$(this).dialog( "close" );												
					},
		"Cancelar": function() {
				$(this).dialog( "close" );
		}
		}//buttons
	});				

//Boton Modificar	
$(document).on("click",".modificar",function(){
	//Obtenemos el idinmueble de la fila
	idperro = $(this).parents("tr").data("idperro");
	//Para que ponga el campo direccion con su valor
	$("#nombremodificar").val($(this).parent().siblings("td.nombre").html());
        
        //Para que ponga el campo direccion con su valor
	$("#duenomodificar").val($(this).parent().siblings("td.dueno").html());
        
        $("#fechamodificar").val($(this).parent().siblings("td.fecha").html());
	
	//Para que me seleccione el idtipomodificar
	var idrazamodificar = $(this).parent().siblings("td.idraza").attr("name");
	$("#idrazamodificar option[value='" + idrazamodificar + "']").attr("selected",true);
	

	
	//Muestro el dialogo
	$( "#dialogomodificar").dialog("open")
	
});	

//----------------------------------------------------
// Validar
$("#formulario").validate({
		rules:{
			nombre:{				
				required:true,
				remote:{
					url:"compruebanombre.php", 
					type: "post",
					data: {'nombre':$("#nombremodificar").val()},
					dataType: 'json'
				}
			}
		},
		messages:{
			nombre:{
				required: "Debe introducir nombre",
				remote: "El nombre del perro ya existe"
				
			}
		}
		});
			
//----------------------------------------------------
// FILTRAR				
$(document).on("click","#filtrar",function(){		//Cargo en la vble global el tipo seleccionado			
		idraza = $("#idraza").val();
		//Llamo Ajax con la función ajax
		$.ajax({
			url: "perro_lista_tabla.php",
			data:{idraza:idraza},
			type: "post",
			beforeSend: cargar,
			success: filtratabla,
			complete: fin,
			cache: false
		});//ajax														
					
});

//Funcion ordenar
$(document).on("click",".ordena",function(){
		
		//obtener el ordenapor
		ordenadelth = $(this).attr("name");
		$.ajax({
			url: "perro_lista_tabla.php",
			data:{ordenapor:ordenadelth},
			type: "post",
                        beforeSend: cargar,
			success: rellenar,
                        complete: fin,
			cache: false
		});
                
});	



//Se ejecuta en el tiempo de espera del servidor
function cargar(){
	//Muestra el gráfico de cargar
	$("#cargando").show();
}

function rellenar(data){		
	$("#contenedor").html(data);
}

//Cargar en el contenedor el resultado de la tabla con filtro				
function filtratabla(data){		
	$("#contenedor").html(data);
}
			
//Una vez cargado vuelve a ocultar el gif animado			
function fin(){
	$("#cargando").hide();
}

 
				
				

//---- NUEVO --------------
//Boton de nuevo inmueble 
//Crea nueva fila al final de la tabla
//Con dos nuevos botones (guardarnuevo y cancelarnuevo)
$(document).on("click","#nuevo",function(){
	$.post("perro_formulario_nuevo.php",function(data){
	//Añade a la tabla de datos una nueva fila
	$("#tabladatos").append(data);
                        $( "#fechanuevo" ).datepicker();
                        $('#fechanuevo').datepicker('option', {dateFormat: 'yy-mm-dd'});
			//Selecciona por defecto la opcion 
			//del select del tipo seleccionado
			$("#idrazanuevo option[value='" + $("#idraza").val() + "']").attr("selected",true);	
			//Ocultamos boton de nuevo inmueble
			//Para evitar añadir mas de uno 
			//a la vez
			$("#nuevo").hide();			
	});//get	
});			

//Boton de cancelar nuevo
$(document).on("click","#cancelarnuevo",function(){	
		//Elimina la nueva fila creada
		$("#filanueva").remove();
		//vuelve a mostrar el botón de nuevo (+)
		$("#nuevo").show();
		
});			

//Boton de guardar nuevo
$(document).on("click","#guardarnuevo",function(){
	$.post("perro_insertar_nuevo.php", {
				"nombrenuevo":$("#nombrenuevo").val(),
                                "duenonuevo":$("#duenonuevo").val(),
                                "fechanuevo":$("#fechanuevo").val(),
				"idrazanuevo":$("#idrazanuevo").val(),
				"idraza":$("#idraza").val()
			},function(data){
				//Pinta de nuevo la tabla
				$("#contenedor").html(data);
				//Vuelve a mostrar el boton de nuevo
				$("#nuevo").show();		
			});//post	
});
											
});//ready
			

		</script>
    </head>
    <body>

<?php include "perro_cabecera.php" ?>
<div id="contenedor">
<?php include "perro_lista_tabla.php" ?>
</div>

<!-- CAPA DE DIALOGO MODIFICAR INMUEBLE -->
<div id="dialogomodificar" title="Modificar Perro">
<?php include "perro_formulario_modificar.php"?>
</div>

<!-- CAPA DE DIALOGO ELIMINAR INMUEBLE -->
<div id="dialogoborrar" title="Eliminar Perro">
  <p>¿Esta seguro que desea eliminar los datos del perro?</p>
</div>



</body>
</html>
