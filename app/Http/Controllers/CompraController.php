<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;


class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $compra = Compra::all();
            $response = $compra->toArray();
            $i=0;
            foreach($compra as $c){
                $response[$i]["categoria"] = $c->user->toArray();
               // $response[$i]["autor"] = $c->autor->toArray();
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
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $compra= new Compra();
            $compra->fechaCompra = $request->fechaCompra;
            $compra->total = $request->total;
            $compra->user_id = $request->user['id'];
            //$libro->autor_id = $request->autor['id'];
            if($compra->save()>= 1){
             return response()->json(['status'=>'ok','data'=>$compra],201);
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
            $compra = Compra::all();
            $response = $compra->toArray();
            $i=0;
            foreach($compra as $c){
                $response[$i]["user"] = $c->user->toArray();
                //$response[$i]["autor"] = $c->autor->toArray();
                $i++;
            }
            //dd($response);
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
            $compra = Compra::findOrFail($id);
            $compra->n = $request->nombre;
            $compra->fechaCompra = $request->fechaCompra;
            $compra->total = $request->total;
            $compra->user_id = $request->user['id'];
           // $libro->autor_id = $request->autor['id'];
            if($compra->update() >= 1){
                return response()->json(['status'=>'ok','data'=>$compra]);
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
            $compra = Compra::findOrFail($id);
            if($compra->delete()>= 1){
             return response()->json(['status'=>'ok','data'=>null],202);
            }
         }catch(\Exception $e){
             return $e->getMessage();
         }
    }
}
