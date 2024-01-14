<?php

namespace App\Livewire\Due\Show\Customer;

use App\Models\customer;
use App\Models\CustomerDue;
use Livewire\Component;

class Index extends Component
{
   
    public $date;
    public $due_customer;
    public $get_customer_id;
   
    // public function mount()
        // {
        //     // Set the initial date when the component is mounted
        //     $this->date = now()->toDateString();
            
        // }
   
    public function resetCustomer()
    {
        $this->reset('due_customer');
       
    }

   

    public function customerDueSearch()
    {
        if($this->get_customer_id && $this->date)
        {
            $this->due_customer = CustomerDue::where('customer_id',$this->get_customer_id)->where('date',$this->date)->orderBy('id','DESC')->get();
           
        }
        elseif($this->date)
        {
            $this->due_customer = CustomerDue::where('date',$this->date)->orderBy('id','DESC')->get();
         
        }
        else
        {
            $this->due_customer = CustomerDue::where('customer_id',$this->get_customer_id)->orderBy('id','DESC')->get();
        }

    }

     
    public function render()
    {
        $customers = customer::get();
        return view('livewire.due.show.customer.index', get_defined_vars());
    }
}
