<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedido extends Model
{
    protected $fillable = [
        'cantidad',
        'talla',
        'producto',
        'estado',
        'numeroDeOrden',
        'producto_id',
        'cliente_id',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo('App\Models\Cliente');
    }
    public function producto(): BelongsTo
    {
        return $this->belongsTo('App\Models\Producto');
    }

    use HasFactory;
}
