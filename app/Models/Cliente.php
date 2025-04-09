<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clients';
    protected $fillable = [
        'user_id',
        'address',
        'phone',
    ];
    public $timestamps = true;
}
