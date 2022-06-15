<link href="..\..\resources\css\Formulario.css" rel="stylesheet" type="text/css">

<!--Recordar que los "name" de los input deben ser iguales a los campos de las tablas si no daran error por que no encuentran la columna con el nombre que pusimos en el input-->
<h1 class="Titulo">Registro de nueva evidencia</h1>
@if(count($errors)>0)
  <div class="error">
    <ul>
   @foreach($errors->all() as $alerta)
       <li>{{$alerta}}</li>
   @endforeach
    </ul>
   </div>
@endif   
<form class="formulario" method="post"  enctype="multipart/form-data" action="{{url('galeria')}}">
         @csrf
         <label for="imagen">Selecciona tu foto</label>
          <input type="file" id="imagen" name="imagen"  class="file">

          <label for="fecha">Fecha (yyyy-mm-dd):</label>
          <input type="text" id="fecha" name="fecha">

          <label for="categoria">Categoria:</label>
          <input type="text" id="categoria" name="categoria">

          <label for="descripción">Descripcion:</label>
          <textarea name="descripción" id="descripción" placeholder="Ingresa una descripcion"></textarea>

          <label for="activo">Activo</label>
          <input class="radio" type="radio" id="activo" name="status" value="Activo">
          <label for="inactivo">Inactivo</label>
          <input class="radio" type="radio" id="inactivo" name="status" value="Inactivo">

          <input type="submit" class="submit" value="Guardar datos">
        
          <a href="{{url('galeria')}}">Regresar al Indice</a>

       </form>
