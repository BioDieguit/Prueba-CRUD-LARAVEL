
          <div class="container">
          <img src="{{asset('storage').'/'.$galeria->Imagen}}" alt="" class="imagen"> 
          
          </div>
          <label for="imagen">Selecciona la nueva foto</label>
          <input type="file" id="imagen" name="imagen"  class="file">
        

          <label for="fecha">Fecha (yyyy-mm-dd):</label>
          <input type="text" id="fecha" name="fecha" value="{{$galeria->Fecha}}">

          <label for="categoria">Categoria:</label>
          <input type="text" id="categoria" name="categoria" value="{{$galeria->Categoria}}">

          <label for="descripción">Descripcion:</label>
          <textarea name="descripción" id="descripción" value="{{$galeria->Descripción}}"></textarea>

          
          <label for="activo">Activo</label>
          <input class="radio" type="radio" id="activo" name="status" value="Activo">
          <label for="activo">Inactivo</label>
          <input class="radio" type="radio" id="inactivo" name="status" value="Inactivo">

          <input type="submit" class="submit" value="Guardar datos">
