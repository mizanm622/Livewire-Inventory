<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankExpense extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    public function bank()
    {
        return $this->belongsTo( Bank::class, 'bank_id');
    }

}
