<?php

namespace App\Livewire\Due\Show\Supplier;

use App\Models\Supplier;
use App\Models\SupplierDue;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
 
   
    public $due_supplier;
    public $date;
    public $get_supplier_id;



    // public function mount()
    // {
    //     // Set the initial date when the component is mounted
    //     $this->date = now()->toDateString();
        
    // }

    public function resetSupplier()
    {
        $this->reset('due_supplier');
       
    }

   

    public function supplierDueSearch()
    {
        if($this->get_supplier_id && $this->date)
        {
            $this->due_supplier = SupplierDue::where('supplier_id',$this->get_supplier_id)->where('date',$this->date)->orderBy('id','DESC')->get();
           
        }
        elseif($this->date)
        {
            $this->due_supplier = SupplierDue::where('date',$this->date)->orderBy('id','DESC')->get();
         
        }
        else
        {
            $this->due_supplier = SupplierDue::where('supplier_id',$this->get_supplier_id)->orderBy('id','DESC')->get();
        }

        //dd( $this->due_supplier);

    }


    public function render()
    {
        //$this->date = Carbon::now()->format('d-m-Y');
        $suppliers = Supplier::get();
       
        return view('livewire.due.show.supplier.index', get_defined_vars());
    }
}
