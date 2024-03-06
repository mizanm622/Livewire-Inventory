<?php

namespace App\Livewire\DailySummary;

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

    }


    public function dailyReportSearch()
    {

        if($this->date)
        {
            $this->sales = SalesCustomerInfo::where('date',$this->date)->get();
            $this->purchase = PurchaseSupplierInfo::where('date',$this->date)->get();
            $this->collection = Collection::where('date',$this->date)->get();
            $this->payment = Payment::where('date',$this->date)->get();

            $this->salary = SalaryExpense::where('date',$this->date)->get();
            $this->bank = BankExpense::where('date',$this->date)->get();
            $this->labour = LabourExpense::where('date',$this->date)->get();
            $this->dokan = DokanExpense::where('date',$this->date)->get();
            $this->carring = CarringExpense::where('date',$this->date)->get();

        }
        else
        {

        }


    }
    public function render()
    {
        return view('livewire.daily-summary.index');
    }
}
