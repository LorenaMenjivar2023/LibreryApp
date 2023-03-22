<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    //definiendo relaciones inversas
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function autor(){
        return $this->belongsTo(Autor::class);
    }
    public function autores_libros(){
        return $this->belongsTo(AutoresLibros::class);
    }
}
