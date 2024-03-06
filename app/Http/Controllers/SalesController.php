<?php

namespace App\Http\Controllers;

use App\Models\ReturnCustomerInfo;
use App\Models\ReturnSalesProduct;
use App\Models\SalesCustomerInfo;
use App\Models\SalesProduct;
use Illuminate\Http\Request;
use PDF;
class SalesController extends Controller
{
    public function index()
    {
        $sales_customers = SalesCustomerInfo::orderBy('id','DESC')->get();
        $sales_products = SalesProduct::get();
        return view('admin.sales.index',get_defined_vars());
    }

    public function view($invoice)
    {
        $customer_info = SalesCustomerInfo::where('invoice_no',$invoice)->first();
        $products = SalesProduct::where('invoice_no',$invoice)->get();
        return view('admin.sales.view',get_defined_vars());
    }

    public function delete($invoice)
    {
         SalesCustomerInfo::where('invoice_no',$invoice)->forceDelete();
         SalesProduct::where('invoice_no',$invoice)->forceDelete();
         $alert = array('msg' => 'Sales Order Successfully Deleted', 'alert-type' => 'warning');
         return redirect()->back()->with($alert);
    }

    public function returnIndex()
    {
        $sales_customers= ReturnCustomerInfo::orderBy('id','DESC')->get();
        return view('admin.sales.return_index',compact('sales_customers'));
    }

    public function returnView($invoice)
    {
        $customer_info = ReturnCustomerInfo::where('return_invoice_no',$invoice)->first();
        $products = ReturnSalesProduct::where('return_invoice_no',$invoice)->get();
        return view('admin.sales.return_view',get_defined_vars());
    }

    public function returnDelete($invoice)
    {
        ReturnCustomerInfo::where('return_invoice_no',$invoice)->forceDelete();
        ReturnSalesProduct::where('return_invoice_no',$invoice)->forceDelete();
         $alert = array('msg' => 'Sales Return Successfully Deleted', 'alert-type' => 'warning');
         return redirect()->back()->with($alert);
    }

    public function searchCustomer(Request $request)
    {
        $sales_customers = SalesCustomerInfo::whereBetween('date', [$request->start_date, $request->end_date])->get();
        $sales_products = SalesProduct::whereBetween('date', [$request->start_date, $request->end_date])->get();
        return view('admin.sales.index', get_defined_vars());

    }

    public function pdfDownload($invoice)
    {
        $customer_info = SalesCustomerInfo::where('invoice_no',$invoice)->first();
        $products = SalesProduct::where('invoice_no',$invoice)->get();
         $pdf = PDF::loadView('admin.sales.pdf.pdf', ['products'=>$products, 'customer_info'=>$customer_info]);
         $date = now()->format('d-m-Y');
         return $pdf->stream('invoice('.$date.').pdf');

    }



}
