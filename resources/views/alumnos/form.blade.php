<div class="row">
<label for="Nombre">{{'Nombre'}}</form>
<input type="text" name="Nombre" id="Nombre" 
value="{{ isset($alumno->Nombre) ? $alumno->Nombre:'' }}">
<br/>
<label for="ApellidoPaterno">{{'Apellido Paterno'}}</form>
<input type="text" name="ApellidoPaterno" id="ApellidoPaterno"
value="{{ isset($alumno->ApellidoPaterno) ? $alumno->ApellidoPaterno:'' }}">
<br/>
<label for="ApellidoMaterno">{{'Apellido Materno'}}</form>
<input type="text" name="ApellidoMaterno" id="ApellidoMaterno" 
value="{{ isset($alumno->ApellidoMaterno) ? $alumno->ApellidoMaterno:'' }}">
<br/>
<label for="Matricula">{{'Matricula'}}</form>
<input type="text" name="Matricula" id="Matricula" 
value="{{ isset($alumno->Matricula) ? $alumno->Matricula:'' }}">
<br/>
<label for="Carrera">{{'Carrera'}}</form>
<input type="text" name="Carrera" id="Carrera" 
value="{{ isset($alumno->Carrera) ? $alumno->Carrera:'' }}">
<br/>
<label for="foto">{{'Foto'}}</form>
@if(isset($alumno->Foto))
<br/>
<img src="{{ asset('storage').'/'.$alumno->Foto}}" alt="" width="100">
@endif
<input type="file" name="foto" id="foto" value="">
<br/>
<input type="submit" value="{{$Modo=='crear' ? 'Agregar Alumno':'Modificar Alumno'}}
">
<a href="{{url('alumnos')}}">Regresar</a>