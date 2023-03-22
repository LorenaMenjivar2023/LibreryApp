<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutorLibro;


class AutorLibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        try{
            $autores = AutorLibro::all();
            $response = $autores->toArray();
            $i=0;
            foreach($autores as $a){
                $response[$i]["autor"] = $a->autor->toArray();
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
            $autor= new AutorLibro();
            $autor->nombre = $request->nombre;
            $autor->autor_id = $request->autor['id'];
            if($autor->save()>= 1){
             return response()->json(['status'=>'ok','data'=>$autor],201);
            }else{
             return response()->json(['status'=>'fail','data'=>null],409);
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
            $autor = AutorLibro::findOrFail($id);
            $response["autor"] = $autor->autor->toArray();
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
            $autor = AutorLibro::findOrFail($id);
            $autor->autor_id = $request->autor['id'];
            if($autor->update() >= 1){
                return response()->json(['status'=>'ok','data'=>$autor]);
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
            $autor = AutorLibro::findOrFail($id);
            if($autor->delete()>= 1){
             return response()->json(['status'=>'ok','data'=>$autor],202);
            }
         }catch(\Exception $e){
             return $e->getMessage();
         }
    }
}
