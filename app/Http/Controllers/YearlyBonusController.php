<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YearlyBonusController extends Controller
{
     // view monthly bonus
     public function show()
     {
         return view('admin.bonus.yearly_bonus.index');
     }
}
