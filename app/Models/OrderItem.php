<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 'pizza_id', 'pizza_size_id', 
        'quantity', 'unit_price'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function pizza(): BelongsTo
    {
        return $this->belongsTo(Pizza::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(PizzaSize::class, 'pizza_size_id');
    }

    public function extraIngredients(): HasMany
    {
        return $this->hasMany(OrderExtraIngredient::class);
    }
    public function ingredientes()
{
    return $this->belongsToMany(Ingrediente::class, 'order_item_ingrediente')
                ->withTimestamps();
}
}