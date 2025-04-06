<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'codes'; 

    
    public function user()
    {
        return $this->belongsTo(User::class, 'client_id'); 
    }

    
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'branch_id');
    }

   
    public function ingredientesExtras()
    {
        return $this->belongsToMany(Ingrediente::class, 'code1_extra_trigedient_id', 'order_id', 'extra_trigedient_id')
                    ->withPivot('quantity');
    }

    
    public function cocinero()
    {
        return $this->belongsTo(Cocinero::class, 'delivery_person_id');
    }
}