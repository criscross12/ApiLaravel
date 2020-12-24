@extends('layouts.app')
@section('content')
<div class=('container')>

crear
<form action="{{url('/alumnos')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
{{csrf_field()}}
@include('alumnos.form',['Modo'=>'crear'])

</form>

</div>
@endsection