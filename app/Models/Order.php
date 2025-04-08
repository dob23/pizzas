<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Ingredient;


class Order extends Model
{
    protected $fillable = [
        'client_id', 
        'branch_id',
        'type',
        'status',
        'total',
        'address',
        'phone',
        'notes'
    ];

    /**
     * Relación con el cliente que hizo el pedido
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Relación con la sucursal donde se hizo el pedido
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Relación con los items del pedido
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}