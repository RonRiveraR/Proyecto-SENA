<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedido extends Model
{
    protected $fillable = [
        'cantidad',
        'producto',
        'estado',
        'cliente_id',
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_producto');
    }

    public function clientes(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    use HasFactory;
}
