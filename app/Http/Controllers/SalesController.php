<?php

namespace App\Http\Controllers;

use App\Models\SalesCustomerInfo;
use App\Models\SalesProduct;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales_customers= SalesCustomerInfo::orderBy('id', 'DESC')->get();
        return view('admin.sales.index',compact('sales_customers'));
    }

    public function view($invoice)
    {
        $customer_info = SalesCustomerInfo::where('invoice_no',$invoice)->first();
        $products = SalesProduct::where('invoice_no',$invoice)->get();
        return view('admin.sales.view',get_defined_vars());
    }
}
