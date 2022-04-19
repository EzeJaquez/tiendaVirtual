<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'categoria_id',
        'nombre',
        'slug',
        'descripcion',
        'imagen',
        'precio',
        'stock',
        'estado'
    ];

    function categoria(){
        return $this->belongsTo('App\Categoria');
    }   
    
    protected $table = "producto";

    use HasFactory;
}
