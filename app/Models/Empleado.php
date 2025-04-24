<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'employees';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'position',
        'identification_number',
        'salary',
        'hire_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Orden::class, 'delivery_person_id');
    }
}
