<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'client_id',
        'branch_id',
        'total_price',
        'status',
        'delivery_type',
        'delivery_person_id',
    ];
}
