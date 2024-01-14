<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonthlyBonusController extends Controller
{
    // view monthly bonus
    public function index()
    {
        return view('admin.bonus.monthly_bonus.index');
    }
}
