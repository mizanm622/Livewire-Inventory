<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReturnPurchaseProduct extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

   

    public function returnProduct()
    {
        return $this->belongsTo(ReturnSupplierInfo::class, 'supplier_id');
    } 
}