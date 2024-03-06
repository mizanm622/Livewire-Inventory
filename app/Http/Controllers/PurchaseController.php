<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\PurchaseProduct;
use App\Models\PurchaseSupplierInfo;
use App\Models\ReturnPurchaseProduct;
use App\Models\ReturnSupplierInfo;
use App\Models\Stack;
use App\Models\Supplier;
use App\Models\Warehouse;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{

    //purchase index
    public function index()
    {
        $purchase_suppliers = PurchaseSupplierInfo::orderBy('id', 'DESC')->get();
        $purchase_products = PurchaseProduct::orderBy('id', 'DESC')->get();
        return view('admin.purchase.index', get_defined_vars());
    }


    //purchase view
    public function view($invoice)
    {
        $supplier_info = PurchaseSupplierInfo::where('invoice_no',$invoice)->first();
        $products = PurchaseProduct::where('invoice_no',$invoice)->get();
        return view('admin.purchase.view',get_defined_vars());
    }

     // delete purchase
     public function delete($invoice)
     {
         PurchaseSupplierInfo::where('invoice_no',$invoice)->forceDelete();
         PurchaseProduct::where('invoice_no',$invoice)->forceDelete();
        $alert = array('msg' => 'Purchase Order Successfully Deleted', 'alert-type' => 'warning');
        return redirect()->back()->with($alert);
    }


    //purchase return index
    public function returnIndex()
    {
        $return_purchase_suppliers = ReturnSupplierInfo::orderBy('id', 'DESC')->get();
        return view('admin.purchase.return_index',compact('return_purchase_suppliers'));

    }

     //purchase return view
     public function returnView($invoice, $id)
     {
         $return_supplier_info = ReturnSupplierInfo::where('return_invoice_no',$invoice)->where('supplier_id',$id)->first();
         $return_products = ReturnPurchaseProduct::where('return_invoice_no',$invoice)->where('supplier_id',$id)->get();
         return view('admin.purchase.return_view',get_defined_vars());
     }


     // delete purchase return
     public function returnDelete($invoice)
     {
        ReturnSupplierInfo::where('return_invoice_no',$invoice)->delete();
        ReturnPurchaseProduct::where('return_invoice_no',$invoice)->forceDelete();

        $alert = array('msg' => 'Return Product info Successfully Remove', 'alert-type' => 'warning');
        return redirect()->back()->with($alert);
    }

    public function searchSupplier(Request $request)
    {
        $purchase_suppliers = PurchaseSupplierInfo::whereBetween('date', [$request->start_date, $request->end_date])->get();
        $purchase_products = PurchaseProduct::whereBetween('date', [$request->start_date, $request->end_date])->get();
        return view('admin.purchase.index', get_defined_vars());
    }

    // Pdf Invoice make
    public function pdfDownload($invoice)
    {
       
       $supplier_info = PurchaseSupplierInfo::where('invoice_no',$invoice)->first();
       $products = PurchaseProduct::where('invoice_no',$invoice)->get();
        $pdf = PDF::loadView('admin.purchase.pdf.pdf', ['products'=>$products, 'supplier_info'=>$supplier_info]);
        $date = now()->format('d-m-Y');
        return $pdf->stream('invoice('.$date.').pdf');
      

    }


}
