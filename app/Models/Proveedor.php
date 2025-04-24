<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'id';
    protected $fillable = ['name','contact_info','created_at','updated_at'];
    public $timestamps = true;
}
