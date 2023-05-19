<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{

    protected $fillable = [
        'nombre',
        'talla',
        'cantidad',
        'color',
        'tipoDeTela',
        'descripcion',
    ];

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_producto');
    }

    public function movimientos(): HasMany
    {
        return $this->hasMany(Movimiento::class);
    }

    use HasFactory;
}
