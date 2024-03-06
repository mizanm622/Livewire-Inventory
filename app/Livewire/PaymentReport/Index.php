<?php

namespace App\Livewire\PaymentReport;

use App\Models\Payment;
use App\Models\Supplier;
use Livewire\Component;

class Index extends Component
{
    public $start_date;
    public $end_date;
    public $get_supplier_id;
    public $total_amount;
    public $total_quantity;
    public $total_weight;
    public $total_ton;
    public $reports;
    public $all_reports;

    // public function mount()
    // {
    //     // Set the initial date when the component is mounted
    //     $this->date = now()->toDateString();

    // }

    public function resetSupplier()
    {
        $this->reset('reports');
        $this->reset('all_reports');
    }


    public function paymentReportSearch()
    {

        if($this->get_supplier_id && ($this->start_date && $this->end_date))
        {

            //get start month
            $start = date('m', strtotime($this->start_date));
             //get end month
            $end = date('m', strtotime($this->end_date));



            $this->reports = Payment::where('supplier_id', $this->get_supplier_id)->whereBetween('date',[$this->start_date, $this->end_date])->get();

        }
        elseif($this->start_date && $this->end_date)
        {
            $this->all_reports = Payment::whereBetween('date',[$this->start_date, $this->end_date])->orderBy('id','DESC')->get();

         }
        else
        {

        }

    }


    public function render()
    {
        $suppliers = Supplier::get();
        return view('livewire.payment-report.index', get_defined_vars());
    }
}
