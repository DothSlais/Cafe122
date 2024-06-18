<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Burrito extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'precio'];

    public function carritos()
    {
        return $this->morphMany(Carrito::class, 'productable');
    }
}
