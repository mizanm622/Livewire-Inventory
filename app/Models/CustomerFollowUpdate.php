<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerFollowUpdate extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    public function customer()
    {
        return $this->belongsTo( customer::class, 'customer_id');
    }
}
