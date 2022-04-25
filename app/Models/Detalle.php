<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle  extends Model
{
    protected $fillable = [
        'pedido_id',
        'producto_id',
        'cantidad',
        'precio',
    ];

    protected $table = "detalle";

    function pedido(){
        return $this->belongsTo('App\Pedido');
    } 

    use HasFactory;
}