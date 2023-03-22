<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $table = "detalles_compras";

    //relacion inversa com compras
    public function compra(){
        return $this->belongsTo(Libro::class);
    }
}
