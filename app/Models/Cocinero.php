<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cocinero extends Model
{
    protected $table = 'en ployees'; 

    protected $fillable = [
        'user_id',
        'position',
        'identification_number',
        'salary',
        'hire_date'
    ];

    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
    public function pedidosParaEntregar()
    {
        return $this->hasMany(Pedido::class, 'delivery_person_id');
    }
}