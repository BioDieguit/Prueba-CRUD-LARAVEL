<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['galerias']=Galeria::paginate(5);

        return view('galeria.Index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Galeria.Formulario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'fecha'=>'required|date|max:100',
            'descripción'=>'required|string|max:2000',
            'categoria'=>'required|string|max:100',
            'imagen'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $mensaje=[
            'required'=>'La :attribute es requerida'
        ];
        
        $this->validate($request,$campos,$mensaje);

        $datosGaleria = request()->except('_token');
        if($request->hasFile('imagen')){
            $datosGaleria['imagen']=$request->file('imagen')->store('uploads','public');
        }
        Galeria::insert($datosGaleria);
        //return response()->json($datosGaleria);
        return redirect('galeria')->with('mensaje','Imagen agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function show(Galeria $galeria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $galeria=Galeria::findOrFail($id);
        return view('Galeria.Edit',compact('galeria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $campos=[
            'fecha'=>'required|date|max:100',
            'descripción'=>'required|string|max:2000',
            'categoria'=>'required|string|max:100'
        ];
        $mensaje=[
            'required'=>'La :attribute es requerida'
        ];

        if($request->hasFile('imagen')){
           $campos=['imagen'=>'required|max:10000|mimes:jpeg,png,jpg'];
           $mensaje=['imagen.required'=>'La :attribute es requerida'];
        }
        
        $this->validate($request,$campos,$mensaje);

        $datosGaleria = request()->except(['_token','_method']);
        if($request->hasFile('imagen')){
            $galeria=Galeria::findOrFail($id);
            Storage::delete('public/'.$galeria->imagen);
            $datosGaleria['imagen']=$request->file('imagen')->store('uploads','public');
        }
       
        Galeria::where('id','=',$id)->update($datosGaleria);

        $galeria=Galeria::findOrFail($id);
        return redirect('galeria')->with('mensaje','Imagen editada con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeria=Galeria::findOrFail($id);
        Storage::delete('public/'.$galeria->Imagen);
        Galeria::destroy($id);
        
        return redirect('galeria')->with('mensaje','Imagen borrada con exito');
    }
}
