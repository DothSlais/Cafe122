<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'productable_id', 'productable_type', 'cantidad'];

    public function productable()
    {
        return $this->morphTo();
    }
}
