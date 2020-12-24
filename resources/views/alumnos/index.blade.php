@extends('layouts.app')
@section('content')
<div class=('container')>

@if(Session::has('Mensaje')){{
    session::get('Mensaje')
}}
@endif

<a href="{{url('alumnos/create')}}" class="btn btn-success">Agregar alumno</a>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th> # </th>
            <th>Foto</th>
            <th>Nombre</th> 
            <th>Matricula</th> 
            <th>Carrera</th>           
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach($alumnos as $alumno)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
            <img src="{{ asset('storage').'/'.$alumno->Foto}}" class="img-thumbnail img-fluid" alt="" width="100">
            </td>
           
            <td>{{$alumno->Nombre}} {{$alumno->ApellidoPaterno}} {{$alumno->ApellidoMaterno}}</td>
            <td>{{$alumno->Matricula}}</td>
            <td>{{$alumno->Carrera}}</td>
            <td>

            <a class="btn btn-warning" href="{{url('/alumnos/'.$alumno->id.'/edit')}}">
            editar
            </a>
            |
            <form method="post" action="{{url('/alumnos/'.$alumno->id)}}" style="display:inline" >
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
            </form>
            
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

@endsection

