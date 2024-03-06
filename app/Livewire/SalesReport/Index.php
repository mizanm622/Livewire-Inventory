<?php

namespace App\Livewire\SalesReport;

use App\Models\customer;
use App\Models\SalesCustomerInfo;
use App\Models\SalesProduct;
use App\Models\SalesReport;
use App\Models\Supplier;
use Livewire\Component;
use PDF;
class Index extends Component
{

    public $start_date;
    public $end_date;
    public $year;
    public $get_customer_id;
    public $total_amount;
    public $total_quantity;
    public $total_weight;
    public $total_ton;
    public $reports;
    public $all_reports;
    public $products;
    public $customer_info;
    public $customers;






    // public function mount()
    // {
    //     // Set the initial date when the component is mounted
    //     $this->date = now()->toDateString();

    // }

    public function resetSupplier()
    {
        $this->reset('reports');
        $this->reset('all_reports');
        $this->reset('customer_info');
        $this->reset('start_date');
        $this->reset('end_date');
        $this->reset('get_customer_id');
    }


    public function getCustomer($id)
    {
        $this->get_customer_id = $id;

        $this->customer_info = customer::where('id',$this->get_customer_id)->first();

    }

    public function pdfDownload()
    {

        // $pdf = PDF::loadView('livewire.sales-report.pdf',['start_date'=>$this->start_date,'end_date'=>$this->end_date,'reports'=>$this->reports, 'products'=>$this->products,'customers'=> $this->customers,'customer_info'=> $this->customer_info]);
        $pdf = PDF::loadView('livewire.sales-report.pdf');
        $date = now()->format('d-m-Y');
        return $pdf->stream('invoice('.$date.').pdf');
    }



    public function salesReportSearch()
    {

        if($this->get_customer_id && ($this->start_date && $this->end_date))
        {

            //get start month
            $start = date('m', strtotime($this->start_date));
             //get end month
            $end = date('m', strtotime($this->end_date));
              //get year to search record
            $this->year = date('Y', strtotime($this->end_date));

            $this->reports = SalesCustomerInfo::where('customer_id', $this->get_customer_id)->whereBetween('date',[$this->start_date, $this->end_date])->get();

            $this->products = SalesProduct::where('customer_id', $this->get_customer_id)->whereBetween('date',[$this->start_date, $this->end_date])->get();



        }
        elseif($this->start_date && $this->end_date)
        {
            $this->all_reports = SalesCustomerInfo::whereBetween('date',[$this->start_date, $this->end_date])->orderBy('id','DESC')->get();
            $this->products = SalesProduct::whereBetween('date',[$this->start_date, $this->end_date])->get();

         }
        else
        {

        }


    }


    public function render()
    {



        $this->customers = customer::get();
        return view('livewire.sales-report.index', get_defined_vars());
    }
}
