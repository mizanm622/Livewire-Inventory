<?php

namespace App\Livewire\Due\Customer;

use App\Models\Bank;
use App\Models\customer;
use App\Models\CustomerDue;
use Livewire\Component;

class Index extends Component
{
    public $date;
    public $customer_id;
    public $customer_name;
    public $address;
    public $mobile;
    public $previous_due;
    public $current_due;
    public $advance_payment;
    public $purpose;
    public $remarks;
    public $payment;


    public function rules()
    {
        return
        [
            'date' => ['required'],
            'customer_name' => ['required'],
            'address' => ['nullable'],
            'mobile' => ['nullable'],
            'previous_due' => ['nullable'],
            'purpose' => ['nullable'],
            'remarks' => ['nullable'],
            'payment' => ['nullable'],
        ];

    }




    // search customer
    public function searchCustomer($id)
    {

        $customer = customer::where('id',$id)->first();

        $this->customer_id =  $customer->id;
        $this->customer_name =  $customer->name;
        $this->address =  $customer->address;
        $this->mobile =  $customer->mobile;
        $this->previous_due =  $customer->previous_due;
        $this->advance_payment =  $customer->advance_payment;

        // generate invoice number
        // $inv_no = CustomerDue::orderBy('id','DESC')->first();
        // if(!$inv_no)
        // {
        //     $this->invoice_no= 01;
        // }
        // else
        // {
        //     $this->invoice_no = $inv_no->invoice_no+1;
        // }

        
    }

    public function storeCustomerDue()
    {

        $validateData = $this->validate();


        //dd( $validateData);

        $curr_due = 0;
        $current_pay = 0;

         if($this->advance_payment)
        {
            $curr_due= Null;
            $current_pay = $this->current_due;
           //dd($curr_due, $current_pay);
        }
        elseif($this->previous_due)
        {
            //if payment amount is greater than the previous due 
            //then the current due will be store into advance payment field
            if($this->current_due<0)
            {
                $curr_due= Null ; 
                $current_pay = abs($this->current_due);
            }
            else
            {
                
                if($this->current_due == 0)
                {
                    //dd($this->current_due);

                    $curr_due= Null; 
                    $current_pay = Null;
                }
                else
                {
                    $curr_due= $this->current_due; 
                    $current_pay = Null;
                }
               
            }
          
            //dd($curr_due, $current_pay);
        }
        else
        {
            $curr_due= Null;
            $current_pay = $this->current_due;
            //dd($curr_due, $current_pay);
        }
        
        CustomerDue::insert([
            'customer_id'=>$this->customer_id,
            'current_due'=> $curr_due,
            'current_advance'=>$current_pay,
            'previous_due'=>$validateData['previous_due'],
            'previous_advance'=>$this->advance_payment,
            'paid_amount'=>$validateData['payment'],
            'date'=>$validateData['date'],
            'purpose'=>$validateData['purpose'],
            'remarks'=>$validateData['remarks'],
           
        ]);

         //update customer info
         customer::where('id',$this->customer_id)->update([
            'name' => $validateData['customer_name'],
            'address' => $validateData['address'],
            'mobile' => $validateData['mobile'],
       ]);

        //update supplier previous due/ Advance payment
        if($this->previous_due)
        {
             //if payment amount is greater than the previous due 
            //then the current due will be store into advance payment field
            if($this->current_due<0)
            {
                customer::where('id',$this->customer_id)->update([
                    'advance_payment' =>abs($this->current_due),
                    'previous_due' =>Null,  
                ]);  
            }
            else
            {
                if($this->current_due == 0)
                {
                    customer::where('id',$this->customer_id)->update([
                        'previous_due' =>Null
                    ]);
                }
                else
                {

                    customer::where('id',$this->customer_id)->update([
                        'previous_due' =>$this->current_due 
                    ]);
                }
                 //update Supplier previous due
            }
           
        }
        elseif($this->advance_payment)
        {
            customer::where('id',$this->customer_id)->update([
                'advance_payment' =>$this->current_due 
            ]);
           
        }
        else
        {
            customer::where('id',$this->customer_id)->update([
                'advance_payment' =>$this->current_due 
            ]);
        }

        

        $notification=array('msg' => 'Customer Due Successfully Inserted!', 'alert-type' => 'success');
        return redirect()->route('customer.due.create')->with($notification);

    }

    // payment search
//    public function paymentSearch($value)
//    {
//     //dd($value);

//     if($value == 'Bank')
//     {

//         //dd('Bank');
//       $this->bank_list = 1;
//     }
//     elseif($value == 'Cheque')
//     {
     
//         $this->bank_list = 2;

//     }

//    }

    public function render()
    {

            if($this->previous_due || $this->advance_payment)
            {

                if(empty($this->previous_due))
                {
                    $this->current_due = $this->advance_payment;
                    if($this->payment)
                    {
                        $this->current_due = $this->payment + $this->advance_payment; 
                    }
                }
                else
                {
                    $this->current_due = $this->previous_due;
                    if($this->payment)
                    {
                        $this->current_due = $this->previous_due -$this->payment; 
                    }
                }


            }
            else
            {
                $this->current_due = 0;
                if($this->payment)
                {
                    $this->current_due+=$this->payment;
                }
            }


        $banks = Bank::get();
        $customers = customer::get();
        return view('livewire.due.customer.index', get_defined_vars());
    }
}
