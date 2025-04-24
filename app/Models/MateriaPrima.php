<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
    protected $table = 'raw_materials';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'unit', 'current_stock'];
    public $timestamps = true;
}
