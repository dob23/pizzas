<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'ingredientes'; // Nombre real de la tabla en la base de datos
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    public $timestamps = true;

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'pizza_ingredients', 'ingredient_id', 'pizza_id')
                    ->withTimestamps();
    }
}
