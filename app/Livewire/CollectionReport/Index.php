<?php

namespace App\Livewire\CollectionReport;

use App\Models\Collection;
use App\Models\customer;
use Livewire\Component;

class Index extends Component
{
    public $start_date;
    public $end_date;
    public $get_customer_id;
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

    public function resetCustomer()
    {
        $this->reset('reports');
        $this->reset('all_reports');
    }


    public function collectionReportSearch()
    {

        if($this->get_customer_id && ($this->start_date && $this->end_date))
        {

            //get start month
            $start = date('m', strtotime($this->start_date));
             //get end month
            $end = date('m', strtotime($this->end_date));


            $this->reports = Collection::where('customer_id', $this->get_customer_id)->whereBetween('date',[$this->start_date, $this->end_date])->get();


        }
        elseif($this->start_date && $this->end_date)
        {
            $this->all_reports = Collection::whereBetween('date',[$this->start_date, $this->end_date])->orderBy('id','DESC')->get();

         }
        else
        {

        }


    }


    public function render()
    {

        $customers = customer::get();
        return view('livewire.collection-report.index', get_defined_vars());
    }
}
