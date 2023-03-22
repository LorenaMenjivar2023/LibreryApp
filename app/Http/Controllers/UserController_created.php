<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController_created extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $user = User::all();
            return $user;
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
            $user = new User();
            $user->nombre = $request->nombre;
            $user->email= $request->nombre;
            $user->password = $request->nombre;
            $user->type = $request->nombre;
            if($user->save()>= 1){
             return response()->json(['status'=>'ok','data'=>$user],201);
            }else{
             return response()->json(['status'=>'fail','data'=>$user],409);
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
            $user = User::findOrFail($id);
            return $user;
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
            $user = User::findOrFail($id);
            $user->nombre = $request->input('nombre');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->type = $request->input('type');
            if($user->update()>= 1){
             return response()->json(['status'=>'ok','data'=>$user],202);
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
            $user = User::findOrFail($id);
            if($user->delete()>= 1){
             return response()->json(['status'=>'ok','data'=>$user],202);
            }
         }catch(\Exception $e){
             return $e->getMessage();
         }
    }
}
