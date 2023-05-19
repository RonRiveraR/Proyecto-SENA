<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movimiento extends Model
{

    protected $fillable = [
        'cantidad',
        'descripcion',
        'producto_id'
    ];

    public function productos(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }

    use HasFactory;
}
