<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PurchaseProduct;
use App\Models\PurchaseSupplierInfo;
use App\Models\Supplier;
use App\Models\SupplierDue;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('admin.supplier.index',compact('suppliers'));
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(Request $request)
    {

        $validator = $request->validate([
            'owner_name' => [ 'max:255'],
            'company_name' => [ 'max:255'],
            'officer_name' => [  'max:255'],
            'dealer_area' => [ 'max:255'],
            'dealer_code' => ['max:20'],
            'phone' => ['max:20'],
            'mobile' => [  'max:20',],
            'address' => [ 'max:255'],
            'ledger_page' => ['max:255'],
            'status' => ['max:255'],
            'security' => ['max:255'],
            'credit_limit' => ['max:20'],
            'advance_payment' => ['max:20'],
            'previous_due' => ['max:20'],
            'remarks' => ['max:500'],
            'photo' =>  ['image','mimes:jpeg,png,jpg,gif,svg','max:1000'],

        ]);

        if(!empty($request->photo))
        {
        $photo = $request->photo;
        $photoName = uniqid().'.'.$photo->getClientOriginalExtension();
        $photo_path = $photo->move('images/supplier/',$photoName);
        }
        else
        {
            $photo_path = "";
        }

        Supplier::insert([
            'owner_name' => $request->owner_name,
            'company_name' => $request->company_name,
            'officer_name' => $request->officer_name,
            'dealer_area' => $request->dealer_area,
            'dealer_code' => $request->dealer_code,
            'email' => $request->email,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'ledger_page' => $request->ledger_page,
            'status' => $request->status,
            'security' => $request->security,
            'advance_payment' => $request->advance_payment,
            'credit_limit' => $request->credit_limit,
            'previous_due' => $request->previous_due,
            'remarks' => $request->remarks,
            'photo' => $photo_path,

        ]);

        $alert = array('msg' => 'Supplier Successfully Inserted', 'alert-type' => 'success');
        return redirect()->route('supplier.index')->with($alert);
    }

    public function edit($id)
    {
        $supplier = Supplier::where('id',$id)->first();

        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update(Request $request)
    {
        $validator = $request->validate([

            'owner_name' => [ 'max:255'],
            'company_name' => [ 'max:255'],
            'officer_name' => [  'max:255'],
            'dealer_area' => [ 'max:255'],
            'dealer_code' => ['max:20'],
            'phone' => ['max:20'],
            'mobile' => [  'max:20',],
            'address' => [ 'max:255'],
            'ledger_page' => ['max:255'],
            'status' => ['max:255'],
            'security' => ['max:255'],
            'credit_limit' => ['max:20'],
            'advance_payment' => ['max:20'],
            'previous_due' => ['max:20'],
            'remarks' => ['max:500'],
            'photo' =>  ['image','mimes:jpeg,png,jpg,gif,svg','max:1000'],

        ]);

        if(!empty($request->photo))
        {
            $photo = $request->photo;
            $photoName = uniqid().'.'.$photo->getClientOriginalExtension();
            $photo_path = $photo->move('images/supplier/',$photoName);
            if(file_exists($request->old_photo))
            {
                unlink($request->old_photo);
            }
        }
        else
        {
            if(!empty($request->old_photo))
            {
                $photo_path=$request->old_photo;
            }
            else
            {
                $photo_path = "";
            }

        }

        Supplier::where('id',$request->id)->update([
            'owner_name' => $request->owner_name,
            'company_name' => $request->company_name,
            'officer_name' => $request->officer_name,
            'dealer_area' => $request->dealer_area,
            'dealer_code' => $request->dealer_code,
            'email' => $request->email,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'ledger_page' => $request->ledger_page,
            'status' => $request->status,
            'security' => $request->security,
            'advance_payment' => $request->advance_payment,
            'credit_limit' => $request->credit_limit,
            'previous_due' => $request->previous_due,
            'remarks' => $request->remarks,
            'photo' => $photo_path,

        ]);

        $alert = array('msg' => 'Supplier Successfully Updated', 'alert-type' => 'info');
        return redirect()->route('supplier.index')->with($alert);

    }

    public function delete($id)
    {
        $getImg = Supplier::where('id',$id)->first();
        if(file_exists($getImg->photo ))
        {
            unlink($getImg->photo);
        }

        Supplier::where('id',$id)->delete();

        $alert = array('msg' => 'Supplier Successfully Deleted', 'alert-type' => 'warning');
        return redirect()->route('supplier.index')->with($alert);
    }

    public function view($id)
    {
        $supplier = Supplier::where('id',$id)->first();
        return view('admin.supplier.view', compact('supplier'));
    }

    public function status($id, $status)
    {


        Supplier::where('id',$id)->update(['status' => $status == 1 ? 0 : 1]);

        $alert = array('msg' => 'Supplier Status Successfully Updated', 'alert-type' => 'info');
        return redirect()->route('supplier.index')->with($alert);

    }

    // due show from here
    public function due()
    {
        return view('admin.supplier.due');

    }

    public function ledger($id)
    {
        
        $supplier = Supplier::where('id',$id)->first();
        $reports = PurchaseSupplierInfo::where('supplier_id',$id)->get();
        $products = PurchaseProduct::where('supplier_id',$id)->get();
        $payments = Payment::where('supplier_id',$id)->get();
        $dues = SupplierDue::where('supplier_id',$id)->get();
        return view('admin.supplier.ledger',get_defined_vars());

    }
    public function statement($id)
    {

        $supplier = Supplier::where('id',$id)->first();
        $reports = PurchaseSupplierInfo::where('supplier_id',$id)->get();
        $products = PurchaseProduct::where('supplier_id',$id)->get();
        $payments = Payment::where('supplier_id',$id)->get();
        $dues = SupplierDue::where('supplier_id',$id)->get();
        return view('admin.supplier.statement',get_defined_vars());
    }

}
