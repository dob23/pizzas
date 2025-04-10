<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'purchases';
    protected $primaryKey = 'id';
    protected $fillable = ['supplier_id', 'raw_material_id', 'quantity', 'purchase_price'];
    public $timestamps = true;

    public function supplier()
    {
        return $this->belongsTo(Proveedor::class, 'supplier_id');
    }

    public function rawMaterial()
    {
        return $this->belongsTo(MateriaPrima::class, 'raw_material_id');
    }
}
