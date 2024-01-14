<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SalaryExpense;
use Illuminate\Http\Request;

class SalaryExpenseController extends Controller
{
    public function index()
    {
        $salary_expenses = SalaryExpense::latest()->get();
        return view('admin.expense.salary.index',get_defined_vars());
    }

    public function create()
    {
       $employees = Employee::get();
        return view('admin.expense.salary.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'date' => [ 'max:10'],
            'voucher_no' => ['max:10'],
            'employee_id' => [ 'max:255'],
            'salary_amount' => [ 'max:100'],
            'salary_month' => [ 'max:100'],
            'payment_amount' => [ 'max:100'],
            'payment_by' => ['max:100'],
            'remarks' => ['max:1000'],
           
        ]);

        SalaryExpense::insert([
            'date' => $request->date,
            'voucher_no' => $request->voucher_no,
            'employee_id' => $request->employee_id,
            'salary_amount' => $request->salary_amount,
            'salary_month' => $request->salary_month,
            'payment_amount' => $request->payment_amount,
            'payment_by' => $request->payment_by,
            'remarks' => $request->remarks,
            'created_by' => auth()->user()->name,
        ]);

        $alert = array('msg' => 'Salary Expense Successfully Inserted', 'alert-type' => 'success');
        return redirect()->route('salary.expense.index')->with($alert);


    }
    public function edit($id)
    {
        $employees = Employee::get();
        $salary_expense = SalaryExpense::where('id',$id)->first();

        return view('admin.expense.salary.edit', get_defined_vars());
    }

    public function update(Request $request)
    {
        $validator = $request->validate([
            'date' => [ 'max:10'],
            'voucher_no' => ['max:10'],
            'employee_id' => [ 'max:255'],
            'salary_amount' => [ 'max:100'],
            'salary_month' => [ 'max:100'],
            'payment_amount' => [ 'max:100'],
            'payment_by' => ['max:100'],
            'remarks' => ['max:1000'],
           
        ]);
        
        SalaryExpense::where('id',$request->id)->update([
            'date' => $request->date,
            'voucher_no' => $request->voucher_no,
            'employee_id' => $request->employee_id,
            'salary_amount' => $request->salary_amount,
            'salary_month' => $request->salary_month,
            'payment_amount' => $request->payment_amount,
            'payment_by' => $request->payment_by,
            'remarks' => $request->remarks,
            
        ]);

        $alert = array('msg' => 'Salary Expense Successfully Update', 'alert-type' => 'info');
        return redirect()->route('salary.expense.index')->with($alert);


    }

    public function delete($id)
    {
       
        SalaryExpense::where('id',$id)->delete();
        $alert = array('msg' => 'Salary Expense Successfully Deleted', 'alert-type' => 'warning');
        return redirect()->route('salary.expense.index')->with($alert);
    }
}
