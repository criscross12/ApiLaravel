<?php

namespace App\Http\Controllers;

use App\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['alumnos']=Alumnos::paginate(5);

        return view('alumnos.index',$datos);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('alumnos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datos = request()->except('_token');
        if($request->hasFile('foto')){
            $datos['foto']= $request->file('foto')->store('uploads','public');
        }
        Alumnos::insert($datos);
        //return response()->json($datos);
        return redirect('alumnos')->with('Mensaje','Alumno Agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function show(Alumnos $alumnos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $alumno = Alumnos::findOrFail($id);
        return view('alumnos.edit',compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datos = request()->except(['_token','_method']);
        if($request->hasFile('foto')){
            $alumno = Alumnos::findOrFail($id);
            Storage::delete('public/'.$alumno->Foto);
            $datos['foto']= $request->file('foto')->store('uploads','public');

        }
        
        Alumnos::where('id','=',$id)->update($datos);
        
        
        $alumno = Alumnos::findOrFail($id);
        //return view('alumnos.edit',compact('alumno'));
        return redirect('alumnos')->with('Mensaje','Alumno Modificado con éxito');

   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $alumno = Alumnos::findOrFail($id);
        
        if(Storage::delete('public/'.$alumno->Foto)){
             Alumnos::destroy($id);
        }
        
        return redirect('alumnos')->with('Mensaje','Alumno Eliminado con éxito');
    }
}
