<?php

namespace App\Http\Controllers;

use App\Models\LabourExpense;
use Illuminate\Http\Request;

class LabourExpenseController extends Controller
{
    public function index()
    {
        $labour_expenses = LabourExpense::latest()->get();
        return view('admin.expense.labour.index',get_defined_vars());
    }

    public function create()
    {
        return view('admin.expense.labour.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'date' => [ 'max:10'],
            'voucher_no' => ['max:10'],
            'purpose' => ['max:255'],
            'amount' => ['max:10'],
            'receive' => ['max:100'],
            'payment_amount' => ['max:100'],
            'payment_by' => ['max:100'],
            'remarks' => ['max:1000'],
           
        ]);

        LabourExpense::insert([
            'date' => $request->date,
            'voucher_no' => $request->voucher_no,
            'purpose' => $request->purpose,
            'amount' => $request->amount,
            'receive' => $request->receive,
            'payment_amount' => $request->payment_amount,
            'payment_by' => $request->payment_by,
            'remarks' => $request->remarks,
            'created_by' => auth()->user()->name,
        ]);

        $alert = array('msg' => 'Labour Expense Successfully Inserted', 'alert-type' => 'success');
        return redirect()->route('labour.expense.index')->with($alert);

    }
    public function edit($id)
    {
       
        $labour_expense = LabourExpense::where('id',$id)->first();

        return view('admin.expense.labour.edit', get_defined_vars());
    }

    public function update(Request $request)
    {
        $validator = $request->validate([
            'date' => [ 'max:10'],
            'voucher_no' => ['max:10'],
            'purpose' => ['max:255'],
            'amount' => ['max:10'],
            'receive' => ['max:100'],
            'payment_amount' => ['max:100'],
            'payment_by' => ['max:100'],
            'remarks' => ['max:1000'],
           
        ]);
        
        LabourExpense::where('id',$request->id)->update([
            'date' => $request->date,
            'voucher_no' => $request->voucher_no,
            'purpose' => $request->purpose,
            'amount' => $request->amount,
            'receive' => $request->receive,
            'payment_amount' => $request->payment_amount,
            'payment_by' => $request->payment_by,
            'remarks' => $request->remarks,

        ]);

        $alert = array('msg' => 'Labour Expense Successfully Update', 'alert-type' => 'info');
        return redirect()->route('labour.expense.index')->with($alert);

    }

    public function delete($id)
    {
       
        LabourExpense::where('id',$id)->delete();
        $alert = array('msg' => 'Labour Expense Successfully Deleted', 'alert-type' => 'warning');
        return redirect()->route('labour.expense.index')->with($alert);
    }
}
