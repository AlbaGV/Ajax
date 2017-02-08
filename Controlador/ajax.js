
$(document).ready(function () {
  var idraza;
  var idperro;



//---------Ordenar por el Valor del select --------------------------------------//

//Ordenar
  $('select#campos').on('change', function () {
    load(1);
  });
//Ordenar
  $('select#forma').on('change', function () {
    load(1);
  });
  load(1);
//Fin de ordenar
//-----------------------------------------------------------------------------------------------------------------

 
  //Crea nueva fila al final de la tabla
  //Con dos nuevos botones (guardarnuevo y cancelarnuevo)
  //**********Valido el formulario de alta************************
  $("#formulario_alta").validate({
     errorClass: "rojo",
      validClass: "verde",
    rules: {
      fechaalta: {
        required: true
        
      },
      nombre: {
        required: true
      },
      dueno: {
        required: true
      },

      idraza: {
        required: true,
        minlength: 1}
    },
    messages: {
      fechaalta:{
       required: "Introducir la fecha"

       },
     nombre: "El campo nombre esta vacio",
      dueno: "El campo dueno esta vacio",
 
      idraza: "El campo   esta vacio"
    }

  });
//--------Dialogo-------------------------------//
  $("#dialogonuevo").dialog({
    autoOpen: false,
    resizable: false,
    modal: true,
    buttons: {
      "Guardar": function () {
       if ($("#formulario_alta").valid()) {
        $.post("../Controlador/anadir.php", {
          idNuevo: $("#idNuevo").val(),
          fechaAltaNuevo: $("#fechaAltaNuevo").val(),
          nombreNuevo: $("#nombreNuevo").val(),
          duenoNuevo: $("#duenoNuevo").val(),
          razaNuevo: $("select#idrazanuevo").val()
                  //Campio los valores antes de que actualize
        }, function (data, status) {
          // $(".container-fluid").html(data);
          load(1);

        })//get			

        $(this).dialog("close");
      }
      },
      "Cancelar": function () {
        $(this).dialog("close");

      }
    }//buttons
  });
  $(document).on("click", "#nuevo", function () {
    $("#dialogonuevo").dialog("open")
  });  
  
  //------------Fin de nuevo---------------------------------------

  //Se ejecuta en el tiempo de espera del servidor
  function cargar() {
    //Muestra el gráfico de cargar
    $("#cargando").show();
  }

  //Una vez cargado vuelve a ocultar el gif animado			
  function fin() {
    $("#cargando").hide();
  }
///Date piker 
//Muestro un formulario hecho con jquery
  $("#fechaAltaModificar").datepicker({
    dateFormat: "dd-mm-yy"
  });





});//Fin Ready
//--- PAGINACION -------------------------------------------------
//--------------------------------------------------------------------------------------------------
////document ready
//Carga la pagina
function load(page) {
  var ordena_Formas = $("select#forma").val();
  var ordena_Campos = $("select#campos").val();
  var parametros = {"action": "ajax", "page": page, "ordenar": ordena_Campos, "forma": ordena_Formas};
  $("#loader").fadeIn('slow');
  $.ajax({
    url: 'listado_controlador.php',
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("<img src='../Vista/img/loader.gif'>");
    },
    success: function (data) {
      $(".outer_div").html(data).fadeIn('slow');
      $("#loader").html("");
    }
  });//Ajax
//-----------Fin de la carga del listad--------------------------------------
//--------------------------------------------------------------------------------------------
//-----------Comienzo DIALOGO DE BORRADO ------------------------------------------
  
  $("#dialogoborrar").dialog({
    autoOpen: false,
    resizable: false,
    modal: true,
    buttons: {
      //BOTON DE BORRAR
      "Borrar": function () {
        //Ajax con get
        $.get("../Controlador/borrar.php", {"idperro": idperro}, function (data, status) {
          $("#perro_" + idperro).fadeOut(1000);
        });//get			
        //Cerrar la ventana de dialogo				
        $(this).dialog("close");
      },
      "Cancelar": function () {
        //Cerrar la ventana de dialogo
        $(this).dialog("close");
      }
    }//buttons
  });//Fin de dialogo borrar

  //Evento click que pulsa el boton borrar
  $(document).on("click", "#borrar", function () {
    //Obtenemos el idinmueble a eliminar
    //a traves del atributo idrecord del tr
    idperro = $(this).parents("tr").data("idperro");
    //Accion para mostrar el dialogo de borrar
    $("#dialogoborrar").dialog("open");
  });
//-----------------------------------------------------------------------------------------------
//**************Validate del fomulario modificar ************************
   $("#formulario").validate({
     errorClass: "rojo",
      validClass: "verde",
    rules: {
      alta: {
        required: true
      
      },
      nombre: {
        required: true
      },
      dueno: {
        required: true
      },
      idraza: {
        required: true,
        minlength: 1}
    },
    messages: {
        
      alta: "Debe introducir la fecha.",
        
      nombre: "El campo nombre esta vacio",
      dueno: "El campo dueno esta vacio",
      idraza: "El campo Mensaje es obligatorio.",
    }

  });//FIn de la validacion 
  
  //---------------------------------------------------------------------------------------------
  //-----MODIFICAR ----------------------------------------------
  
  $("#dialogomodificar").dialog({
    autoOpen: false,
    resizable: false,
    modal: true,
    buttons: {
      "Guardar": function () {
        if ($("#formulario").valid()) {


          $.post("../Controlador/modificar.php", {
            idModificar: idperro,
            fechaAltaModificar: $("#fechaAltaModificar").val(),
            nombreModificar: $("#nombreModificar").val(),
            duenoModificar: $("#duenoModificar").val(),
            razaModificar: $("#razaModificar").val()
                    //Campio los valores antes de que actualize
          }, function (data, status) {
            //$(".container-fluid").html(data);
            //Cambio los dadtos al instante 
            $("#perro_" + idperro + " td.alta").html($("#fechaAltaModificar").val());
            $("#perro_" + idperro + " td.nombre").html($("#nombreModificar").val());
            $("#perro_" + idperro + " td.dueno").html($("#duenoModificar").val());
            $("#perro_" + idperro + " td.idraza").html($("#razaModificar").val());


          })//get			

          $(this).dialog("close");
        }
      },
      "Cancelar": function () {
        $(this).dialog("close");
      }
    }//buttons
  });//Fin de dialogo modificar

  //Boton Modificar	
  //Pinto los datos de cada campo
  $(document).on("click", "#modificar", function () {
    //Obtenemos lo valores de la fila que queremos modificar
   
    idperro = $(this).parents("tr").data("idperro");
    //muentra el valor de esa fila 
    $("#idModificar").val($(this).parent().siblings("td.id").html());
    //Para que ponga el campo de la fecha de alta con su val
    $("#fechaAltaModificar").val($(this).parent().siblings("td.alta").html());
   
    $("#nombreModificar").val($(this).parent().siblings("td.nombre").html());
  
    $("#duenoModificar").val($(this).parent().siblings("td.dueno").html());

    var idrazamodificar = $(this).parent().siblings("td.idraza").attr("name");
    $("#razaModificar option[value='" + idrazamodificar + "']").attr("selected", true);

    //Muestro el dialogo
    $("#dialogomodificar").dialog("open");

  });


//----------------------------------------------------


//Se ejecuta en el tiempo de espera del servidor
  function cargar() {
    //Muestra el gráfico de cargar
    $("#cargando").show();
  }

//Una vez cargado vuelve a ocultar el gif animado			
  function fin() {
    $("#cargando").hide();
  }
//-------AutoCompleta -------------//
//AUTOCOMPLETADO

}
