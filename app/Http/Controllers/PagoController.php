<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pago;
use App\Models\DetalleCompra;




class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       try{
        $pagos = Pago::all();
        $response = $pagos->toArray();
        $i=0;
        foreach($pagos as $pago){
            $response[$i]['user'] = $pago->user->toArray();
            $i++;
        }
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
        //vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $errores = 0;
            DB::beginTransaction();
            //creando instancia de pago
            $pago = new Pago();
            $pago->nombre = $request->nombre;
            $pago->num_tarjeta = $request->num_tarjeta;
            $pago->direccion = $request->direccion;
            $pago->user_id = $request->user['id'];
            if($pago->save() <=0){
                $errores++;
            }
            //obteniendo detalle para guardarlo en detalle_compra
            $detalle = $request->detalleCompra;
            foreach($detalle as $key => $det){
                //creando un objeto de tipo detalleCompra
                $detalleCompra = new DetalleCompra();
                $detalleCompra->nombre = $det['nombre'];
                $detalleCompra->libro_id= $det['libro']['id'];
                $detalleCompra->compra_id = $det['compra']['id'];
                if($detalleCompra->save()<=0){
                    $errores++;
                }
            }
            if($errores == 0){
                DB::commit();
             return response()->json(['status'=>'ok','data'=>$detalleCompra],201);
                
            }else{
                DB::rollback();
             return response()->json(['status'=>'fail','data'=>null],409);


            }
        }catch(\Exception $e){
            DB::rollback();
            return $e->getMessage();
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
