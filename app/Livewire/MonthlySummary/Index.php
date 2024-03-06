<?php

namespace App\Livewire\MonthlySummary;

use App\Models\BankExpense;
use App\Models\CarringExpense;
use App\Models\Collection;
use App\Models\DokanExpense;
use App\Models\LabourExpense;
use App\Models\Payment;
use App\Models\PurchaseSupplierInfo;
use App\Models\SalaryExpense;
use App\Models\SalesCustomerInfo;
use Livewire\Component;

class Index extends Component
{
    public $date;
    public $purchase;
    public $sales;
    public $collection;
    public $payment;
    public $salary;
    public $bank;
    public $labour;
    public $dokan;
    public $carring;
    public $month_name;



    public function mount()
    {
        // Set the initial date when the component is mounted
        $this->date = now()->toDateString();

    }

    public function resetReport()
    {
        $this->reset('sales');
        $this->reset('purchase');
        $this->reset('collection');
        $this->reset('payment');
        $this->reset('salary');
        $this->reset('bank');
        $this->reset('labour');
        $this->reset('dokan');
        $this->reset('carring');
        $this->reset('month_name');

    }


    public function monthlyReportSearch()
    {

        if($this->date)
        {

            $this->month_name = date("F-Y", strtotime($this->date));

            $this->sales = SalesCustomerInfo::whereMonth('date',  date('m', strtotime($this->date)))
            ->whereYear('date',date('Y', strtotime($this->date)))
            ->get();

            //$this->sales = SalesCustomerInfo::where('date',$this->date)->get();
            $this->purchase = PurchaseSupplierInfo::whereMonth('date',  date('m', strtotime($this->date)))
            ->whereYear('date',date('Y', strtotime($this->date)))
            ->get();

            $this->collection = Collection::whereMonth('date',  date('m', strtotime($this->date)))
            ->whereYear('date',date('Y', strtotime($this->date)))
            ->get();

            $this->payment = Payment::whereMonth('date',  date('m', strtotime($this->date)))
            ->whereYear('date',date('Y', strtotime($this->date)))
            ->get();

            $this->salary = SalaryExpense::whereMonth('date',  date('m', strtotime($this->date)))
            ->whereYear('date',date('Y', strtotime($this->date)))
            ->get();

            $this->bank = BankExpense::whereMonth('date',  date('m', strtotime($this->date)))
            ->whereYear('date',date('Y', strtotime($this->date)))
            ->get();

            $this->labour = LabourExpense::whereMonth('date',  date('m', strtotime($this->date)))
            ->whereYear('date',date('Y', strtotime($this->date)))
            ->get();

            $this->dokan = DokanExpense::whereMonth('date',  date('m', strtotime($this->date)))
            ->whereYear('date',date('Y', strtotime($this->date)))
            ->get();

            $this->carring = CarringExpense::whereMonth('date',  date('m', strtotime($this->date)))
            ->whereYear('date',date('Y', strtotime($this->date)))
            ->get();

        }
        else
        {

        }


    }
    public function render()
    {
        return view('livewire.monthly-summary.index');
    }
}
