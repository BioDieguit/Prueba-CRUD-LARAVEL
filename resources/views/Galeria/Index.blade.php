@extends('layouts.app')
@section('content')
<div class="container">

<div class="alert alert-success" role="alert">
    @if(Session::has('mensaje'))
    {{Session::get('mensaje')}}
     @endif
</div>



<a href="{{url('galeria/create')}}" class="btn btn-success">Registrar nueva evidencia</a>

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Imagen</th>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Categoria</th>
            <th>Status</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @foreach($galerias as $foto)
        <tr>
            <td>{{$foto->id}}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$foto->Imagen}}" alt="" width="150px" height="50px">
            </td>
            <td>{{$foto->Fecha}}</td>
            <td>{{$foto->Descripción}}</td>
            <td>{{$foto->Categoria}}</td>
            <td>{{$foto->Status}}</td>
            <td>
                <a href="{{url('galeria/'.$foto->id.'/edit')}}" class="btn btn-warning">Edit</a>   
                
                <form action="{{url('galeria/'.$foto->id)}}" method="post" class="d-inline">
                @if($foto->Status=='Inactivo')
                <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger" >
                @csrf
                {{method_field('DELETE')}}
                @else
                <input type="submit" value="Borrar" class="btn btn-danger" disabled>
                   @endif
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!!$galerias->links()!!}
</div>
@endsection