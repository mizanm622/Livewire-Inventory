<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PurchaseSupplierInfo extends Model
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
    
    

}