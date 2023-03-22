<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    //relacion de 1 amuchos con detalle_compra
    public function detalles_compras(){
        return $this->hasMany(DetalleCompras::class);
    }
   
    //relacion inversa con el usuario para cuando el cliente hace la compra
    public function user(){
        return $this->belongsTo(User::class);
    }
}
