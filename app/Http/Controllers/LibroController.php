<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;




class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $libros = Libro::all();
            $response = $libros->toArray();
            $i=0;
            foreach($libros as $l){
                $response[$i]["categoria"] = $l->categoria->toArray();
                $response[$i]["autor"] = $l->autor->toArray();
                $i++;
            }
            //dd($response);
            return $response;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $libro= new Libro();
            $libro->nombre = $request->nombre;
            $libro->descripcion = $request->descripcion;
            $libro->precio = $request->precio;
            $libro->imagen = $request->imagen;
            $libro->categoria_id = $request->categoria['id'];
            $libro->autor_id = $request->autor['id'];
            if($libro->save()>= 1){
             return response()->json(['status'=>'ok','data'=>$libro],201);
            }else{
             return response()->json(['status'=>'fail','data'=>$libro],409);
            }
         }catch(\Exception $e){
             return $e->getMessage();
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $libro = Libro::findOrFail($id);
            $response["categoria"] = $libro->categoria->toArray();
            $response["autor"] = $libro->autor->toArray();
            return $response;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
        $libro = Libro::findOrFail($id);
        $libro->nombre = $request->nombre;
        $libro->descripcion = $request->descripcion;
        $libro->precio = $request->precio;
        $libro->imagen = $request->imagen;
        $libro->categoria_id = $request->categoria['id'];
        $libro->autor_id = $request->autor['id'];
        if($libro->update() >= 1){
            return response()->json(['status'=>'ok','data'=>$libro]);
        }else{
            return response()->json(['status'=>'fail','data'=>null]);

        }
    }catch(\Exception $e){
        return $e->getMessage();
    }
}
    



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $libro = Libro::findOrFail($id);
            if($libro->delete()>= 1){
             return response()->json(['status'=>'ok','data'=>null],202);
            }
         }catch(\Exception $e){
             return $e->getMessage();
         }
    }
}
