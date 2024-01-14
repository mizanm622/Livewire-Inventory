<?php

namespace App\Http\Controllers;

use App\Models\BankExpense;
use Illuminate\Http\Request;

class BankExpenseController extends Controller
{
    public function index()
    {
        $bank_expenses = BankExpense::latest()->get();
        return view('admin.expense.bank.index',get_defined_vars());
    }

    public function create()
    {
        return view('admin.expense.bank.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'date' => [ 'max:10'],
            'voucher_no' => ['max:10'],
            'bank_name' => ['max:255'],
            'profit_amount' => ['max:100'],
            'profit_month' => ['max:100'],
            'other_charge' => ['max:100'],
            'payment_amount' => ['max:100'],
            'payment_by' => ['max:100'],
            'remarks' => ['max:1000'],
           
        ]);

        BankExpense::insert([
            'date' => $request->date,
            'voucher_no' => $request->voucher_no,
            'bank_name' => $request->bank_name,
            'profit_amount' => $request->profit_amount,
            'profit_month' => $request->profit_month,
            'other_charge' => $request->other_charge,
            'payment_amount' => $request->payment_amount,
            'payment_by' => $request->payment_by,
            'remarks' => $request->remarks,
            'created_by' => auth()->user()->name,
        ]);

        $alert = array('msg' => 'Bank Expense Successfully Inserted', 'alert-type' => 'success');
        return redirect()->route('bank.expense.index')->with($alert);

    }
    public function edit($id)
    {
       
        $bank_expense = BankExpense::where('id',$id)->first();

        return view('admin.expense.bank.edit', get_defined_vars());
    }

    public function update(Request $request)
    {
        $validator = $request->validate([
            'date' => [ 'max:10'],
            'voucher_no' => ['max:10'],
            'bank_name' => ['max:255'],
            'profit_amount' => ['max:100'],
            'profit_month' => ['max:100'],
            'other_charge' => ['max:100'],
            'payment_amount' => ['max:100'],
            'payment_by' => ['max:100'],
            'remarks' => ['max:1000'],
           
        ]);
        
        BankExpense::where('id',$request->id)->update([
            'date' => $request->date,
            'voucher_no' => $request->voucher_no,
            'bank_name' => $request->bank_name,
            'profit_amount' => $request->profit_amount,
            'profit_month' => $request->profit_month,
            'other_charge' => $request->other_charge,
            'payment_amount' => $request->payment_amount,
            'payment_by' => $request->payment_by,
            'remarks' => $request->remarks,
            'created_by' => auth()->user()->name,
            
        ]);

        $alert = array('msg' => 'Bank Expense Successfully Update', 'alert-type' => 'info');
        return redirect()->route('bank.expense.index')->with($alert);

    }

    public function delete($id)
    {
       
        BankExpense::where('id',$id)->delete();
        $alert = array('msg' => 'Bank Expense Successfully Deleted', 'alert-type' => 'warning');
        return redirect()->route('bank.expense.index')->with($alert);
    }
}
