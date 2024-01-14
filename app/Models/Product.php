<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo( Category::class, 'category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo( SubCategory::class, 'subcategory_id');
    }
    public function brand()
    {
        return $this->belongsTo( Brand::class, 'brand_id');
    }
    public function productGroup()
    {
        return $this->belongsTo( ProductGroup::class, 'group_id');
    }
    public function size()
    {
        return $this->belongsTo( Size::class, 'size_id');
    }
    public function unit()
    {
        return $this->belongsTo( Unit::class, 'unit_id');
    }
    public function warehouse()
    {
        return $this->belongsTo( Warehouse::class, 'warehouse_id');
    }
}
