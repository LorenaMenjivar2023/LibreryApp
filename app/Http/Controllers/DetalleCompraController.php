<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompra;
use Illuminate\Http\Request;

class DetalleCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $detalle = DetalleCompra::all();
            $response = $detalle->toArray();
            $i=0;
            foreach($detalle as $d){
                $response[$i]["compra"] = $d->compra->toArray();
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
            $detalle= new DetalleCompra();
            $detalle->cantidad = $request->nombre;
            $detalle->precio = $request->nombre;
            $detalle->totalPagar = $request->nombre;
            $detalle->compra_id = $request->compra['id'];
            if($detalle->save()>= 1){
             return response()->json(['status'=>'ok','data'=>$detalle],201);
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
            $detalle = DetalleCompra::findOrFail($id);
            $response["compra"] = $detalle->compra->toArray();
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
            $detalle = DetalleCompra::findOrFail($id);
            $detalle->compra_id = $request->compra['id'];
            if($detalle->update() >= 1){
                return response()->json(['status'=>'ok','data'=>$detalle]);
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
            $detalle = DetalleCompra::findOrFail($id);
            if($detalle->delete()>= 1){
             return response()->json(['status'=>'ok','data'=>$detalle],202);
            }
         }catch(\Exception $e){
             return $e->getMessage();
         }
    }
}
