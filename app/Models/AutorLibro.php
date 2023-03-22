<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorLibro extends Model
{
    use HasFactory;
    protected $table = "autores_libros";

    //relacion inversa con libros
    public function compra(){
        return $this->belongsTo(Compra::class);
    }
}
