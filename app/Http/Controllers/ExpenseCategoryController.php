<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $expense_categories = ExpenseCategory::latest()->get();
        return view('admin.expense_category.index',compact('expense_categories'));
    }

    public function create()
    {
        return view('admin.expense_category.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => [ 'max:255'],
            'description' => ['max:1000'],
        ]);

        ExpenseCategory::insert([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $alert = array('msg' => 'Expense Category Successfully Inserted', 'alert-type' => 'success');
        return redirect()->route('expense_category.index')->with($alert);


    }
    public function edit($id)
    {
        $expense_category = ExpenseCategory::where('id',$id)->first();

        return view('admin.expense_category.edit', compact('expense_category'));
    }

    public function update(Request $request)
    {
        $validator = $request->validate([
            'name' => [ 'max:255'],
            'description' => ['max:1000'],
           
        ]);
        
        ExpenseCategory::where('id',$request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $alert = array('msg' => 'Expense Category Successfully Update', 'alert-type' => 'info');
        return redirect()->route('expense_category.index')->with($alert);

    }

    public function delete($id)
    {
       
        ExpenseCategory::where('id',$id)->delete();

        $alert = array('msg' => 'Expense Category Successfully Deleted', 'alert-type' => 'warning');
        return redirect()->route('expense_category.index')->with($alert);
    }
}
