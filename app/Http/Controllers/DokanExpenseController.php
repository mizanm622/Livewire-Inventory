<?php

namespace App\Http\Controllers;

use App\Models\DokanExpense;
use Illuminate\Http\Request;

class DokanExpenseController extends Controller
{
    public function index()
    {
        $dokan_expenses = DokanExpense::latest()->get();
        return view('admin.expense.dokan.index',get_defined_vars());
    }

    public function create()
    {
        return view('admin.expense.dokan.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'date' => [ 'max:10'],
            'voucher_no' => ['max:10'],
            'dokan_rent' => ['max:255'],
            'rent_amount' => ['max:10'],
            'rent_month' => ['max:100'],
            'payment_amount' => ['max:100'],
            'receiving_by' => ['max:100'],
            'payment_by' => ['max:100'],
            'remarks' => ['max:1000'],

        ]);

        $voucher_no = DokanExpense::orderBy('id','DESC')->first();
        if(!$voucher_no)
        {
            $voucher_no= 01;
        }
        else
        {
            $voucher_no = $voucher_no->voucher_no+1;
        }


        DokanExpense::insert([
            'date' => $request->date,
            'voucher_no' => $voucher_no,
            'dokan_rent' => $request->dokan_rent,
            'rent_amount' => $request->rent_amount,
            'rent_month' => $request->rent_month.'-'.date('y', strtotime($request->date)),
            'payment_by' => $request->payment_by,
            'receiving_by' => $request->receiving_by,
            'payment_amount' => $request->payment_amount,
            'remarks' => $request->remarks,
            'created_by' => auth()->user()->name,
        ]);

        $alert = array('msg' => 'Dokan Expense Successfully Inserted', 'alert-type' => 'success');
        return redirect()->route('dokan.expense.index')->with($alert);

    }
    public function edit($id)
    {

        $dokan_expense = DokanExpense::where('id',$id)->first();

        return view('admin.expense.dokan.edit', get_defined_vars());
    }

    public function update(Request $request)
    {
        $validator = $request->validate([
            'date' => [ 'max:10'],
            'voucher_no' => ['max:10'],
            'dokan_rent' => ['max:255'],
            'rent_amount' => ['max:10'],
            'rent_month' => ['max:100'],
            'payment_amount' => ['max:100'],
            'receiving_by' => ['max:100'],
            'payment_by' => ['max:100'],
            'remarks' => ['max:1000'],

        ]);

        DokanExpense::where('id',$request->id)->update([
            'date' => $request->date,
            'voucher_no' => $request->voucher_no,
            'dokan_rent' => $request->dokan_rent,
            'rent_amount' => $request->rent_amount,
            'rent_month' => $request->rent_month.'-'.date('y', strtotime($request->date)),
            'payment_by' => $request->payment_by,
            'receiving_by' => $request->receiving_by,
            'payment_amount' => $request->payment_amount,
            'remarks' => $request->remarks,
        ]);

        $alert = array('msg' => 'Dokan Expense Successfully Update', 'alert-type' => 'info');
        return redirect()->route('dokan.expense.index')->with($alert);

    }

    public function delete($id)
    {

        DokanExpense::where('id',$id)->delete();
        $alert = array('msg' => 'Dokan Expense Successfully Deleted', 'alert-type' => 'warning');
        return redirect()->route('dokan.expense.index')->with($alert);
    }
}
