<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido  extends Model
{
    protected $fillable = [
        'usuario_id',
        'precio_total',
        'estado'
    ];

    function usuario(){
        return $this->belongsTo('App\User');
    } 

    protected $table = "pedido";

    use HasFactory;
}