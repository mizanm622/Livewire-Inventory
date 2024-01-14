<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowDueController extends Controller
{
    // show all customer due list from here
    public function showCustomerDue()
    {
        return view('admin.due.show.customer.create');
        
    }

    // show all supplier due list from here
    public function showSupplierDue()
    {
        return view('admin.due.show.supplier.create');
    }
}
