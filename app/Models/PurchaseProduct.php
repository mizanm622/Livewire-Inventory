<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseProduct extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function warehouse()
    {
        return $this->belongsTo( Warehouse::class, 'warehouse_id');
    }

    public function supplier()
    {
        return $this->belongsTo( Supplier::class, 'supplier_id');
    } 
    
    public function product()
    {
        return $this->belongsTo( Product::class, 'product_id');
    }
}