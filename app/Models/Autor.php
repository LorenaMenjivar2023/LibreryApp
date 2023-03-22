<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
    protected $table = "autores";
    //relacion de 1 a muchos con libros
    public function libros(){
        return $this->hasMany(Libro::class);
}
}