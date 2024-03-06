<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function priceGroup()
    {
        return $this->belongsTo( PriceGroup::class, 'price_group_id');
    }

}
