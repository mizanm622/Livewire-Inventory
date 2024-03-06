<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\customer;
use App\Models\CustomerDue;
use App\Models\PriceGroup;
use App\Models\SalesCustomerInfo;
use App\Models\SalesProduct;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = customer::latest()->get();

        return view('admin.customer.index',get_defined_vars());
    }

    public function create()
    {
        $price_groups = PriceGroup::get();
        return view('admin.customer.create',get_defined_vars());
    }

    public function store(Request $request)
    {

        $validator = $request->validate([
            'name' => [ 'max:255'],
            'father_name' => ['max:255'],
            'company_name' => ['max:255'],
            'phone' => [ 'max:14'],
            'mobile' => [ 'max:14'],
            'address' => [  'max:255'],
            'nid' => ['max:20'],
            'birthday' => ['max:10'],
            'ledger_page' => ['max:100'],
            'type' => ['max:255'],
            'price_group_id' => ['max:11'],
            'security' => ['max:255'],
            'credit_limit' => ['max:20'],
            'advance_payment' => ['max:20'],
            'previous_due' => ['max:20'],
            'remarks' => ['max:255'],
            'guarantor_name' => ['max:255'],
            'guarantor_company_name' => ['max:255'],
            'guarantor_birthday' => ['max:10'],
            'guarantor_mobile' => ['max:14'],
            'guarantor_father_name' => ['max:255'],
            'guarantor_phone' => ['max:14'],
            'guarantor_address' => ['max:255'],
            'guarantor_security' => ['max:255'],
            'guarantor_nid' => ['max:20'],
            'guarantor_remarks' => ['max:255'],
            'photo' =>  ['image','mimes:jpeg,png,jpg,gif,svg','max:1000'],
            'guarantor_photo' =>  ['image','mimes:jpeg,png,jpg,gif,svg','max:1000'],

        ]);

        if(empty($request->photo)){
            $photo_path = "";
        }
        else
        {
        $photo = $request->photo;
        $photoName = uniqid().'.'.$photo->getClientOriginalExtension();
        $photo_path = $photo->move('images/customer/',$photoName);
        }
        if(empty($request->guarantor_photo)){
            $guarantor_photo_path = "";
        }
        else
        {

        $guarantor_photo = $request->guarantor_photo;
        $guarantor_photoName = uniqid().'.'.$guarantor_photo->getClientOriginalExtension();
        $guarantor_photo_path = $guarantor_photo->move('images/customer/',$guarantor_photoName);
        }



        customer::insert([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'nid' => $request->nid,
            'birthday' => $request->birthday,
            'ledger_page' => $request->ledger_page,
            'type' => $request->type,
            'price_group_id' => $request->price_group,
            'security' => $request->security,
            'advance_payment' => $request->advance_payment,
            'credit_limit' => $request->credit_limit,
            'previous_due' => $request->previous_due,
            'opening_balance' => $request->previous_due ?? $request->advance_payment,
            'remarks' => $request->remarks,
            'photo' => $photo_path,
            'guarantor_name' => $request->guarantor_name,
            'guarantor_company_name' => $request->guarantor_company_name,
            'guarantor_birthday' => $request->guarantor_birthday,
            'guarantor_mobile' => $request->guarantor_mobile,
            'guarantor_father_name' => $request->guarantor_father_name,
            'guarantor_phone' => $request->guarantor_phone,
            'guarantor_email' => $request->guarantor_email,
            'guarantor_address' => $request->guarantor_address,
            'guarantor_security' => $request->guarantor_security,
            'guarantor_nid' => $request->guarantor_nid,
            'guarantor_remarks' => $request->guarantor_remarks,
            'guarantor_photo' =>$guarantor_photo_path,
        ]);

        $alert = array('msg' => 'Customer Successfully Inserted', 'alert-type' => 'success');
        return redirect()->route('customer.index')->with($alert);
    }


    public function edit($id)
    {

        $customer = customer::where('id',$id)->first();
        $price_groups = PriceGroup::get();
        return view('admin.customer.edit',get_defined_vars());
    }

    public function update(Request $request)
    {
        $validator = $request->validate([
            'name' => [ 'max:255'],
            'father_name' => ['max:255'],
            'company_name' => ['max:255'],
            'phone' => [ 'max:14'],
            'mobile' => [ 'max:14'],
            'address' => [  'max:255'],
            'nid' => ['max:20'],
            'birthday' => ['max:10'],
            'ledger_page' => ['max:100'],
            'type' => ['max:255'],
            'price_group_id' => ['max:11'],
            'security' => ['max:255'],
            'credit_limit' => ['max:20'],
            'advance_payment' => ['max:20'],
            'previous_due' => ['max:20'],
            'remarks' => ['max:255'],
            'guarantor_name' => ['max:255'],
            'guarantor_company_name' => ['max:255'],
            'guarantor_birthday' => ['max:10'],
            'guarantor_mobile' => ['max:14'],
            'guarantor_father_name' => ['max:255'],
            'guarantor_phone' => ['max:14'],
            'guarantor_address' => ['max:255'],
            'guarantor_security' => ['max:255'],
            'guarantor_nid' => ['max:20'],
            'guarantor_remarks' => ['max:255'],
            'photo' =>  ['image','mimes:jpeg,png,jpg,gif,svg','max:1000'],
            'guarantor_photo' =>  ['image','mimes:jpeg,png,jpg,gif,svg','max:1000'],
        ]);

        if(!empty($request->photo))
        {
            $photo = $request->photo;
            $photoName = uniqid().'.'.$photo->getClientOriginalExtension();
            $photo_path = $photo->move('images/customer/',$photoName);
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

        if(!empty($request->photo))
        {
            $guarantor_photo = $request->guarantor_photo;
            $guarantor_photoName = uniqid().'.'.$guarantor_photo->getClientOriginalExtension();
            $guarantor_photo_path = $guarantor_photo->move('images/customer/',$guarantor_photoName);
            if(file_exists($request->guarantor_old_photo))
            {
                unlink($request->guarantor_old_photo);
            }
        }
        else
        {
            if(!empty($request->guarantor_old_photo))
            {
                $guarantor_photo_path=$request->guarantor_old_photo;
            }
            else
            {
                $guarantor_photo_path = "";
            }


        }

        customer::where('id',$request->id)->update([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'nid' => $request->nid,
            'birthday' => $request->birthday,
            'ledger_page' => $request->ledger_page,
            'type' => $request->type,
            'price_group_id' => $request->price_group,
            'security' => $request->security,
            'advance_payment' => $request->advance_payment,
            'credit_limit' => $request->credit_limit,
            'previous_due' => $request->previous_due,
            'remarks' => $request->remarks,
            'photo' => $photo_path,
            'guarantor_name' => $request->guarantor_name,
            'guarantor_company_name' => $request->guarantor_company_name,
            'guarantor_birthday' => $request->guarantor_birthday,
            'guarantor_mobile' => $request->guarantor_mobile,
            'guarantor_father_name' => $request->guarantor_father_name,
            'guarantor_phone' => $request->guarantor_phone,
            'guarantor_email' => $request->guarantor_email,
            'guarantor_address' => $request->guarantor_address,
            'guarantor_security' => $request->guarantor_security,
            'guarantor_nid' => $request->guarantor_nid,
            'guarantor_remarks' => $request->guarantor_remarks,
            'guarantor_photo' =>$guarantor_photo_path,
        ]);

        $alert = array('msg' => 'Customer Successfully Updated', 'alert-type' => 'info');
        return redirect()->route('customer.index')->with($alert);

    }

    public function delete($id)
    {
        $getImg = customer::where('id',$id)->first();
        if(file_exists($getImg->photo))
        {
            unlink($getImg->photo);
            if(file_exists($getImg->guarantor_photo ))
            {
                unlink($getImg->guarantor_photo);
            }
        }

        customer::where('id',$id)->delete();

        $alert = array('msg' => 'Customer Successfully Deleted', 'alert-type' => 'warning');
        return redirect()->route('customer.index')->with($alert);
    }

    public function view($id)
    {
        $customer = customer::where('id',$id)->first();
        return view('admin.customer.view', compact('customer'));
    }

    public function due()
    {

        return view('admin.customer.due');

    }

    public function ledger($id)
    {

        $customer = customer::where('id',$id)->first();
        $reports = SalesCustomerInfo::where('customer_id',$id)->get();
        $products = SalesProduct::where('customer_id',$id)->get();
        $collections = Collection::where('customer_id',$id)->get();;
        $dues = CustomerDue::where('customer_id',$id)->get();;
        return view('admin.customer.ledger',get_defined_vars());
    }

    public function statement($id)
    {

        $customer = customer::where('id',$id)->first();
        $reports = SalesCustomerInfo::where('customer_id',$id)->get();
        $products = SalesProduct::where('customer_id',$id)->get();
        $collections = Collection::where('customer_id',$id)->get();;
        $dues = CustomerDue::where('customer_id',$id)->get();;
        return view('admin.customer.statement',get_defined_vars());
    }


}

