<?php

namespace App\Http\Controllers;

use App\Models\BankExpense;
use App\Models\CarringExpense;
use App\Models\DokanExpense;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\LabourExpense;
use App\Models\SalaryExpense;
use Illuminate\Http\Request;
use PDF;

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

    public function report()
    {
        return view('admin.expense.report.report');
    }

    public function expenseReportDownload($start_date, $end_date, $get_expense)
    {
        if($get_expense == 1 && ($start_date && $end_date))
        {

            $salaries = SalaryExpense::whereBetween('date',[$start_date, $end_date])->get();
            $expense_name = 'Salary';

            $pdf = PDF::loadView('admin.report.pdf.expense',['start_date'=>$start_date,'end_date'=>$end_date,'salaries'=>$salaries, 'expense_name'=>$expense_name]);
            $date = now()->format('d-m-Y');
            return $pdf->stream($expense_name.'_expense_report('.$date.').pdf');
        }
        elseif($get_expense == 2 && ($start_date && $end_date))
        {
            $banks = BankExpense::whereBetween('date',[$start_date, $end_date])->orderBy('id','DESC')->get();
            $expense_name = 'Bank';
            $pdf = PDF::loadView('admin.report.pdf.expense',['start_date'=>$start_date,'end_date'=>$end_date,'banks'=>$banks, 'expense_name'=>$expense_name]);
            $date = now()->format('d-m-Y');
            return $pdf->stream($expense_name.'_expense_report('.$date.').pdf');

         }
         elseif($get_expense == 3 && ($start_date && $end_date))
         {
            $labours = LabourExpense::whereBetween('date',[$start_date, $end_date])->orderBy('id','DESC')->get();
            $expense_name = 'Labour';

            $pdf = PDF::loadView('admin.report.pdf.expense',['start_date'=>$start_date,'end_date'=>$end_date,'labours'=>$labours, 'expense_name'=>$expense_name]);
            $date = now()->format('d-m-Y');
            return $pdf->stream($expense_name.'_expense_report('.$date.').pdf');
         }
         elseif($get_expense == 4 && ($start_date && $end_date))
         {
            $carrings = CarringExpense::whereBetween('date',[$start_date, $end_date])->orderBy('id','DESC')->get();
            $expense_name = 'Carring';

            $pdf = PDF::loadView('admin.report.pdf.expense',['start_date'=>$start_date,'end_date'=>$end_date,'carrings'=>$carrings, 'expense_name'=>$expense_name]);
            $date = now()->format('d-m-Y');
            return $pdf->stream($expense_name.'_expense_report('.$date.').pdf');
         }
          elseif($get_expense == 5 && ($start_date && $end_date))
         {
            $dokans = DokanExpense::whereBetween('date',[$start_date, $end_date])->orderBy('id','DESC')->get();
            $expense_name = 'Dokan';

            $pdf = PDF::loadView('admin.report.pdf.expense',['start_date'=>$start_date,'end_date'=>$end_date,'dokans'=>$dokans, 'expense_name'=>$expense_name]);
            $date = now()->format('d-m-Y');
            return $pdf->stream($expense_name.'_expense_report('.$date.').pdf');
         }
        else
        {

        }
    }
}
