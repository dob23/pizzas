<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'codes'; 

    protected $fillable = [
        'client_id',
        'branch_id',
        'total_price',
        'status',
        'delivery_type',
        'delivery_person_id'
    ];

    
    public function cliente()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    
    public function ingredientesExtras()
    {
        return $this->belongsToMany(Ingrediente::class, 'code1_extra_trigedient_id', 'order_id', 'extra_trigedient_id')
                   ->withPivot('quantity');
    }

    
    public function repartidor()
    {
        return $this->belongsTo(Cocinero::class, 'delivery_person_id');
    }
}