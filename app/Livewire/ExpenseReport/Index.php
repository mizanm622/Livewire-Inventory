<?php

namespace App\Livewire\ExpenseReport;


use App\Models\BankExpense;
use App\Models\CarringExpense;
use App\Models\DokanExpense;
use App\Models\LabourExpense;
use App\Models\SalaryExpense;
use Livewire\Component;

class Index extends Component
{
    public $start_date;
    public $end_date;
    public $get_expense;
    public $expense_name;

    public $banks;
    public $salaries;
    public $labours;
    public $carrings;
    public $dokans;

    // public function mount()
    // {
    //     // Set the initial date when the component is mounted
    //     $this->date = now()->toDateString();

    // }

    public function resetExpenses()
    {
        $this->reset('banks');
        $this->reset('salaries');
        $this->reset('labours');
        $this->reset('carrings');
        $this->reset('dokans');
        $this->reset('expense_name');
    }


    public function expenseReportSearch()
    {
       // dd($this->get_expense);

        if($this->get_expense == 1 && ($this->start_date && $this->end_date))
        {

            $this->salaries = SalaryExpense::whereBetween('date',[$this->start_date, $this->end_date])->get();
            $this->expense_name = 'Salary';
        }
        elseif($this->get_expense == 2 && ($this->start_date && $this->end_date))
        {
            $this->banks = BankExpense::whereBetween('date',[$this->start_date, $this->end_date])->orderBy('id','DESC')->get();

            $this->expense_name = 'Bank';
         }
         elseif($this->get_expense == 3 && ($this->start_date && $this->end_date))
         {
            $this->labours = LabourExpense::whereBetween('date',[$this->start_date, $this->end_date])->orderBy('id','DESC')->get();

            $this->expense_name = 'Labour';
         }
         elseif($this->get_expense == 4 && ($this->start_date && $this->end_date))
         {
            $this->carrings = CarringExpense::whereBetween('date',[$this->start_date, $this->end_date])->orderBy('id','DESC')->get();

            $this->expense_name = 'Carring';
         }
          elseif($this->get_expense == 5 && ($this->start_date && $this->end_date))
         {
            $this->dokans = DokanExpense::whereBetween('date',[$this->start_date, $this->end_date])->orderBy('id','DESC')->get();

            $this->expense_name = 'Dokan';
         }
        else
        {

        }

    }


    public function render()
    {

        return view('livewire.expense-report.index', get_defined_vars());
    }
}
