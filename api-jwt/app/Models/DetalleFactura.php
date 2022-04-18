<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'factura_id',
        'producto_id',
        'cantidad',
        'valor_unitario',
        'valor_total',
        'estado'
    ];
}