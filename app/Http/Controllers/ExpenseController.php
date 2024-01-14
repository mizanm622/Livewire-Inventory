<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::latest()->get();
        return view('admin.expense.index',get_defined_vars());
    }

    public function create()
    {
        $expense_categories = ExpenseCategory::get();
        return view('admin.expense.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'date' => [ 'max:10'],
            'category_id' => ['max:10'],
            'expense_for' => [ 'max:255'],
            'payment_type' => [ 'max:100'],
            'account' => [ 'max:100'],
            'amount' => [ 'max:100'],
            'reference_no' => ['max:100'],
            'note' => ['max:1000'],
           
        ]);

        Expense::insert([
            'date' => $request->date,
            'category_id' => $request->category_id,
            'expense_for' => $request->expense_for,
            'payment_type' => $request->payment_type,
            'account' => $request->account,
            'amount' => $request->amount,
            'reference_no' => $request->reference_no,
            'note' => $request->note,
            'created_by' => auth()->user()->name,
        ]);

        $alert = array('msg' => 'Expense Successfully Inserted', 'alert-type' => 'success');
        return redirect()->route('expense.index')->with($alert);


    }
    public function edit($id)
    {
        $expense_categories = ExpenseCategory::get();
        $expense = Expense::where('id',$id)->first();

        return view('admin.expense.edit', get_defined_vars());
    }

    public function update(Request $request)
    {
        $validator = $request->validate([
            'date' => [ 'max:10'],
            'category_id' => ['max:10'],
            'expense_for' => [ 'max:255'],
            'payment_type' => [ 'max:100'],
            'account' => [ 'max:100'],
            'amount' => [ 'max:100'],
            'reference_no' => ['max:100'],
            'note' => ['max:1000'],
           
        ]);
        
        Expense::where('id',$request->id)->update([
            'date' => $request->date,
            'category_id' => $request->category_id,
            'expense_for' => $request->expense_for,
            'payment_type' => $request->payment_type,
            'account' => $request->account,
            'amount' => $request->amount,
            'reference_no' => $request->reference_no,
            'created_by' => $request->created_by,
            'note' => $request->note,
        ]);

        $alert = array('msg' => 'Expense Successfully Update', 'alert-type' => 'info');
        return redirect()->route('expense.index')->with($alert);


    }

    public function delete($id)
    {
       
        Expense::where('id',$id)->delete();

        $alert = array('msg' => 'Expense Successfully Deleted', 'alert-type' => 'warning');
        return redirect()->route('expense.index')->with($alert);
    }
}
