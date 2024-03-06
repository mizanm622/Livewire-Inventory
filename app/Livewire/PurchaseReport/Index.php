<?php

namespace App\Livewire\PurchaseReport;

use App\Models\PurchaseProduct;
use App\Models\PurchaseSupplierInfo;
use App\Models\Supplier;
use Livewire\Component;

class Index extends Component
{
    public $start_date;
    public $end_date;
    public $year;
    public $get_supplier_id;
    public $total_amount;
    public $total_quantity;
    public $total_weight;
    public $total_ton;
    public $reports;
    public $all_reports;
    public $products;
    public $supplier_info;







    // public function mount()
    // {
    //     // Set the initial date when the component is mounted
    //     $this->date = now()->toDateString();

    // }

    

    public function resetSupplier()
    {
        $this->reset('reports');
        $this->reset('supplier_info');
        $this->reset('all_reports');
        $this->reset('start_date');
        $this->reset('end_date');
        $this->reset('get_supplier_id');
    }


    public function getSupplier($id)
    {
        $this->get_supplier_id = $id;

        $this->supplier_info = Supplier::where('id',$this->get_supplier_id)->first();

    }

    public function purchaseReportSearch()
    {

        if($this->get_supplier_id && ($this->start_date && $this->end_date))
        {
            //get start month
            $start = date('m', strtotime($this->start_date));
             //get end month
            $end = date('m', strtotime($this->end_date));
              //get year to search record
            $this->year = date('Y', strtotime($this->end_date));
            $this->reports = PurchaseSupplierInfo::where('supplier_id', $this->get_supplier_id)->whereBetween('date',[$this->start_date, $this->end_date])->get();
            $this->products = PurchaseProduct::where('supplier_id', $this->get_supplier_id)->whereBetween('date',[$this->start_date, $this->end_date])->get();



        }
        elseif($this->start_date && $this->end_date)
        {
            $this->all_reports = PurchaseSupplierInfo::whereBetween('date',[$this->start_date, $this->end_date])->orderBy('id','DESC')->get();
            $this->products = PurchaseProduct::whereBetween('date',[$this->start_date, $this->end_date])->get();
        }
        else
        {

        }
    }

    public function render()
    {
        $suppliers = Supplier::get();
        return view('livewire.purchase-report.index', get_defined_vars());
    }
}
