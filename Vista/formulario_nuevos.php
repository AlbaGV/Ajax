

    <form id="formulario_alta">

        <div id="th">Fecha</div> <div id="td"><input type="text" placeholder="yyyy-mm-dd" name="fechaalta" id="fechaAltaNuevo"><br></div>
      <div id="th">Nombre del perro</div><div id="td"> <input type="text" name="nombre" size="10" id="nombreNuevo" required><br></div>
      <div id="th">Nombre del dueño</div><div id="td"> <input type="text" name="dueno" size="10" id="duenoNuevo" required><br></div>
     <div id="th">Raza<select placeholder="Raza" name="idraza" id="idrazanuevo" >
          <?php
          //Esta es la imagen --><td class="imagen"> $casa->getImagen()</td> <th>Imagen</th>
          foreach ($data['listadoRaza'] as $fila2) {
            ?>
            <option value="<?php echo $fila2->getIdRaza(); ?>"><?php echo$fila2->getNombreRaza(); ?></option>
          <?php } //while  ?>
        </select></div>

    </form>


