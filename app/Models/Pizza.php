<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $table = 'pizzas';
    protected $fillable = ['name'];
    public $timestamps = true;

    public function sizes()
    {
        return $this->hasMany(PizzaSize::class);
    }
}
