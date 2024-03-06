<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnSalesProduct extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo( customer::class, 'customer_id');
    }
    public function store()
    {
        return $this->belongsTo(Store::class, 'product_store_id');
    }
    public function product()
    {
        return $this->belongsTo( Product::class, 'product_id');
    }
}
