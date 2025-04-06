<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $fillable = ['name', 'price'];

    
    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'code1_extra_trigedient_id', 'extra_trigedient_id', 'order_id')
                   ->withPivot('quantity');
    }
}