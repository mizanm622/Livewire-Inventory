<?php

namespace App\Livewire\YearlySummary;

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
    public $year;



    // public function mount()
    // {
    //     // Set the initial date when the component is mounted
    //     $this->date = now()->toDateString();

    // }

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
        $this->reset('year');

    }

    public function getYear($value)
    {
        $this->date = $value;
        //dd($this->date);
    }


    public function yearlyReportSearch()
    {


        if($this->date)
        {

           // dd($this->date);

            $this->year = $this->date;


            $this->sales = SalesCustomerInfo::whereYear('date',$this->date)
            ->get();

            //$this->sales = SalesCustomerInfo::where('date',$this->date)->get();
            $this->purchase = PurchaseSupplierInfo::whereYear('date',$this->date)
            ->get();

            $this->collection = Collection::whereYear('date',$this->date)
            ->get();

            $this->payment = Payment::whereYear('date',$this->date)
            ->get();

            $this->salary = SalaryExpense::whereYear('date',$this->date)
            ->get();

            $this->bank = BankExpense::whereYear('date',$this->date)
            ->get();

            $this->labour = LabourExpense::whereYear('date',$this->date)
            ->get();

            $this->dokan = DokanExpense::whereYear('date',$this->date)
            ->get();

            $this->carring = CarringExpense::whereYear('date',$this->date)
            ->get();

        }
        else
        {

        }

    }


    public function render()
    {
        return view('livewire.yearly-summary.index');
    }
}
