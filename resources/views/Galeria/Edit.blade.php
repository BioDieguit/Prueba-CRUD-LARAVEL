<link href="..\..\..\resources\css\Formulario.css" rel="stylesheet" type="text/css">

<!--Recordar que los "name" de los input deben ser iguales a los campos de las tablas si no daran error por que no encuentran la columna con el nombre que pusimos en el input-->
<h1 class="Titulo">Edicion de evidencia</h1>
@if(count($errors)>0)
  <div class="error">
    <ul>
   @foreach($errors->all() as $alerta)
       <li>{{$alerta}}</li>
   @endforeach
    </ul>
   </div>
@endif   
<form class="formulario" enctype="multipart/form-data" method="post" action="{{url('galeria/'.$galeria->id)}}">
        @csrf
        {{method_field('PATCH')}}
         @include('Galeria.Form')
         <a href="{{url('galeria')}}">Regresar al Indice</a>
       </form>
      

