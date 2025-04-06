<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'codes'; // Nombre real de la tabla en DB

    protected $fillable = [
        'client_id',
        'branch_id',
        'total_price',
        'status',
        'delivery_type',
        'delivery_person_id'
    ];

    // Relación con el usuario (cliente)
    public function cliente()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    // Relación con ingredientes extras (tabla pivote)
    public function ingredientesExtras()
    {
        return $this->belongsToMany(Ingrediente::class, 'code1_extra_trigedient_id', 'order_id', 'extra_trigedient_id')
                   ->withPivot('quantity');
    }

    // Relación con el cocinero/mensajero
    public function repartidor()
    {
        return $this->belongsTo(Cocinero::class, 'delivery_person_id');
    }
}