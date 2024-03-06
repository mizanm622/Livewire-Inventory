<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SalesProduct extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function warehouse()
    {
        return $this->belongsTo( Warehouse::class, 'warehouse_id');
    }

    public function customer()
    {
        return $this->belongsTo( customer::class, 'customer_id');
    }

    public function product()
    {
        return $this->belongsTo( Product::class, 'product_id');
    }

    public function store()
    {
        return $this->belongsTo( Store::class, 'product_store_id');
    }
}
