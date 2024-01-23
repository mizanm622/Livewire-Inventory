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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\PDF;


class PurchaseController extends Controller
{
    public function index()
    {
        $purchase_suppliers = PurchaseSupplierInfo::orderBy('id', 'DESC')->get();
        return view('admin.purchase.index',compact('purchase_suppliers'));
    }

    public function create()
    {
        $products = Product::get();
        $suppliers = Supplier::get();
        $warehouses = Warehouse::get();
        return view('admin.purchase.create',get_defined_vars());
    }

    public function view($invoice)
    {
        $supplier_info = PurchaseSupplierInfo::where('invoice_no',$invoice)->first();
        $products = PurchaseProduct::where('invoice_no',$invoice)->get();
        return view('admin.purchase.view',get_defined_vars());
    }

    public function sessionStore(Request $request)
    {
        $cart = session()->get('cart');
        if(!$cart)
        {
            $cart = [
                $request->id => [
                'code' => $request->code,
                'name' => $request->name,
                'price_rate' => $request->price_rate,
                'mrp_rate' => $request->mrp_rate,
                'quantity' => $request->quantity,
                'discount' => $request->discount,
                'total' => $request->quantity*$request->price_rate,
                'product_id' => $request->id,
                ]
            ];
            session()->put('cart',  $cart);
            $alert = array('msg' => 'Product Successfully Added to Cart', 'alert-type' => 'success');
            return redirect()->back()->with($alert);
        }
        if(isset($cart[$request->id]))
        {
            
        $alert = array('msg' => 'Already  Added!', 'alert-type' => 'info');
        return redirect()->back()->with($alert);
        }
            $cart[$request->id] =[
                'code' => $request->code,
                'name' => $request->name,
                'price_rate' => $request->price_rate,
                'mrp_rate' => $request->mrp_rate,
                'quantity' => $request->quantity,
                'discount' => $request->discount,
                'total' => $request->quantity*$request->price_rate,
                'product_id' => $request->id,
            ];

        session()->put('cart',  $cart);
        $alert = array('msg' => 'Product Successfully Added to Cart', 'alert-type' => 'success');
        return redirect()->back()->with($alert);
    }
     // remove purchase session
     public function delete($id)
     {

        $cart = session()->get('cart');
          if (isset($cart[$id])) {
                unset($cart[$id]);
              session()->put('cart', $cart);
             }

        $alert = array('msg' => 'Product Successfully Remove from Cart', 'alert-type' => 'warning');
        return redirect()->back()->with($alert);
    }

    // store purchase product into table
    public function purchaseStore(Request $request)
    {
        //randomly generate purchase 4 digit code
        $purchase_code = mt_rand(0000,9999);

        PurchaseSupplierInfo::insert([
            'supplier_id' =>$request->supplier_id,
            'invoice_no' =>$request->invoice_no,
            'total' =>$request->total,
            'warehouse_id' =>$request->warehouse_id,
            'transport_no' =>$request->transport_no,
            'delivery_man' =>$request->delivery_man,
            'prepare' =>$request->prepare,
            'old_due' =>$request->old_due,
            'date' =>$request->date,
            'remarks' =>$request->remarks,

        ]);


        
      for ($i = 0; $i < count($request->product_id); $i++) {
     
    
        PurchaseProduct::insert([
            'supplier_id' =>$request->supplier_id,
            'invoice_no' =>$request->invoice_no,
            'product_id'=>$request['product_id'][$i],
            'product_code'=>$request['code'][$i],
            'purchase_code'=>$purchase_code,
            'warehouse_id'=>$request->warehouse_id,
            'product_name'=>$request['name'][$i],
            'product_price'=>$request['price_rate'][$i],
            'product_quantity'=>$request['quantity'][$i]+$request['discount'][$i],
            'sub_total'=>$request['quantity'][$i]*$request['price_rate'][$i],
            'date'=>$request->date,
        ]);
    }
      
            
           
           //  $data = Stack::find($request->product_id)->increment('total_purchase',$request->quantity);
            
           

        session()->forget('cart');
        $alert = array('msg' => 'Product Successfully Purchased', 'alert-type' => 'success');
        return redirect()->back()->with($alert);
        
    }

    public function returnCreate()
    {
        $products = PurchaseProduct::latest()->get();
        $suppliers = Supplier::get();
        $SupplierInfo = PurchaseSupplierInfo::get();
        return view('admin.purchase.return_create',get_defined_vars());
    }

    //store return products in session 
    public function sessionReturnStore(Request $request)
    {
        $return = session()->get('return');
        if(!$return)
        {
            $return = [
                $request->id => [
                'code' => $request->code,
                'name' => $request->name,
                'price_rate' => $request->price_rate,
                'mrp_rate' => $request->mrp_rate,
                'quantity' => $request->quantity,
                'discount' => $request->discount,
                'total' => $request->quantity*$request->price_rate,
                'product_id' => $request->id,
                'purchase_code' => $request->purchase_code,
                ]
            ];

            session()->put('return',  $return);
            $alert = array('msg' => 'Return Product Successfully Added to Cart', 'alert-type' => 'success');
            return redirect()->back()->with($alert);
        }
        if(isset($return[$request->id]))
        {
            
        $alert = array('msg' => 'Return Product Already  Added!', 'alert-type' => 'info');
        return redirect()->back()->with($alert);
        }
            $return[$request->id] =[
                'code' => $request->code,
                'name' => $request->name,
                'price_rate' => $request->price_rate,
                'mrp_rate' => $request->mrp_rate,
                'quantity' => $request->quantity,
                'total' => $request->quantity*$request->price_rate,
                'product_id' => $request->id,
                'purchase_code' => $request->purchase_code,
            ];

        session()->put('return',  $return);
        $alert = array('msg' => 'Return Product Successfully Added to Cart', 'alert-type' => 'success');
        return redirect()->back()->with($alert);

    }

     // remove purchase session
     public function returnDelete($id)
     {

        $return = session()->get('return');
          if (isset($return[$id])) {
                unset($return[$id]);
              session()->put('return', $return);
             }

        $alert = array('msg' => 'Return Product Successfully Remove from Cart', 'alert-type' => 'warning');
        return redirect()->back()->with($alert);
    }

    //store return product in table
    public function returnStore(Request $request)
    {
        //randomly generate purchase 4 digit code
        $return_code = mt_rand(1111,9999);


       if(empty($request->all_discount))
       {
        $after_discount = 0;
        $percent_discount = 0;
        $fix_discount = 0;
       }
       else
       {
            if($request->discount == 0)
            {
                $discount = ($request->all_discount/100)*$request->total;
                $after_discount = $request->total - $discount;
                $percent_discount = $request->all_discount;
                $fix_discount = 0;
            }
            else
            {
                $after_discount = $request->total - $request->all_discount;
                $fix_discount =  $request->all_discount;
                $percent_discount = 0;
            }
       }
       

        ReturnSupplierInfo::insert([
            'supplier_id' =>$request->supplier_id,
            'total' =>$request->total+$request->other_charge,
            'after_discount' =>$after_discount,
            'warehouse_id' =>$request->warehouse_id,
            'reference_no' =>$request->reference_no,
            'total_quantity' =>$request->total_quantity,
            'other_charge' =>$request->other_charge,
            'percent_discount' => $percent_discount,
            'fix_discount' =>$fix_discount,
            'status' =>$request->status,
            'date' =>$request->date,
            'amount' =>$request->amount,
            'payment_type' =>$request->payment_type,
            'account' =>$request->account,
            'payment_note' =>$request->payment_note,
            'note' =>$request->note,
            'created_by' =>auth()->user()->name,

        ]);


        $return = session()->get('return');
        if(!$return)
        {
            $alert = array('msg' => 'Please Add Product to Cart', 'alert-type' => 'warning');
            return redirect()->back()->with($alert);
        }
        else
        {
            foreach (Session::get('return') as  $row)
            {
            ReturnPurchaseProduct::insert([
                'supplier_id' =>$request->supplier_id,
                'warehouse_id'=>$request->warehouse_id,
                'product_id'=>$row['product_id'],
                'purchase_code'=>$row['purchase_code'],
                'return_code'=>$return_code,
                'product_code'=>$row['code'],
                'product_name'=>$row['name'],
                'product_price'=>$row['price_rate'],
                'product_quantity'=>$row['quantity'],
                'sub_total'=>$row['price_rate']*$row['quantity'],
                'status' =>$request->status,
                'date'=>$request->date,
            ]);
            }
    
            session()->forget('return');
            $alert = array('msg' => 'Product Successfully Purchased', 'alert-type' => 'success');
            return redirect()->back()->with($alert);
        }
       
    }

    public function returnIndex()
    {
        $returnSuppliers = ReturnSupplierInfo::get();
        return view('admin.purchase.return_index',compact('returnSuppliers'));
    }

    public function testCart()
    {
        return view('admin.purchase.test');
    }

    public function pdfGenerator()
    {
        
        //$supplier_info = PurchaseSupplierInfo::where('invoice_no',$invoice)->first();
        //$products = PurchaseProduct::where('invoice_no',$invoice)->get();
        $pdf = PDF::loadView('dashboard');
        return $pdf->download('bc.pdf');
        // return $pdf->stream(); 
        
       // return view('admin.purchase.invoice',get_defined_vars());
    }
    

   
}