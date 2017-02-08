



      <form id="formulario">
    
        <div id="th">ID</div>
         <div id="td"> <input type="number" id="idModificar"  disabled></div>
     
     
         <div id="th">Fecha Alta</div>
          <div id="td"> <input type="text" name="alta" class="fecha" id="fechaAltaModificar"></div>
     
        <div id="th">Nombre del perro</div>
         <div id="td"><input type="text" name="nombre" id="nombreModificar" value="" size="10" ></div>


      
           <div id="th">Nombre del dueño</div>
         <div id="td"> <input type="text" name="dueno"  id="duenoModificar" value="" size="10"  ></div>

         <div id="th">Raza</div>
           <div id="td"><select placeholder="Raza" name="idraza" id="razaModificar">
            <?php
            
            foreach ($data['listadoRaza'] as $fila2) {
              ?>
              <option value="<?php echo $fila2->getIdRaza(); ?>"><?php echo$fila2->getNombreRaza(); ?></option>
            <?php } //while  ?>
          </select></div>
            
      </form>

