<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //devolver una lista de registros
        try{
            $categorias = Categoria::all();
            return $categorias;
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
        return view('admin.categorias');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
           $categoria = new Categoria();
           $categoria->nombre = $request->nombre;
           if($categoria->save()>= 1){
            return response()->json(['status'=>'ok','data'=>$categoria],201);
           }else{
            return response()->json(['status'=>'fail','data'=>$categoria],409);
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
            $categoria = Categoria::findOrFail($id);
            return $categoria;
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
            $detalle = Categoria::findOrFail($id);
            $detalle->nombre = $request->input('nombre');
            if($detalle->update()>= 1){
             return response()->json(['status'=>'ok','data'=>$detalle],202);
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
            $categoria = Categoria::findOrFail($id);
            if($categoria->delete()>= 1){
             return response()->json(['status'=>'ok','data'=>$categoria],202);
            }
         }catch(\Exception $e){
             return $e->getMessage();
         }
    }
}
