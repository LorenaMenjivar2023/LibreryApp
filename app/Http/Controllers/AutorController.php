<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;



class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $autores= Autor::all();
            return $autores;
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
            $autor = new Autor();
            $autor->nombre = $request->nombre;
            if($autor->save()>= 1){
             return response()->json(['status'=>'ok','data'=>$autor],201);
            }else{
             return response()->json(['status'=>'fail','data'=>$autor],409);
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
            $autor = Autor::findOrFail($id);
            return $autor;
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
            $autor = Autor::findOrFail($id);
            $autor->nombre = $request->input('nombre');
            if($autor->update()>= 1){
             return response()->json(['status'=>'ok','data'=>$autor],202);
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
            $autor = Autor::findOrFail($id);
            if($autor->delete()>= 1){
             return response()->json(['status'=>'ok','data'=>$autor],202);
            }
         }catch(\Exception $e){
             return $e->getMessage();
         }
    }
}
