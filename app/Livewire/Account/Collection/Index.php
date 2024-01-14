<?php

namespace App\Livewire\Account\Collection;

use App\Models\Bank;
use App\Models\Collection;
use App\Models\customer;
use Livewire\Component;

class Index extends Component
{

    public $date;
    public $customer_id;
    public $customer_name;
    public $address;
    public $mobile;
    public $previous_due;
    public $advance_payment;
    public $invoice_no;
    public $payment_by;
    public $bank_title;
    public $bank_list;
    public $remarks;
    public $payment;
    public $current_due;


    public function rules()
    {
        return
        [
            'date' => ['required'],
            'previous_due' => ['nullable'],
            'invoice_no' => ['required'],
            'payment_by' => ['nullable'],
            'bank_title' => ['nullable'],
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
        $inv_no = Collection::orderBy('id','DESC')->first();
        if(!$inv_no)
        {
            $this->invoice_no= 01;
        }
        else
        {
            $this->invoice_no = $inv_no->invoice_no+1;
        }

        
    }

    public function storeCollection()
    {

        $validateData = $this->validate();

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
        
        Collection::insert([
            'customer_id'=>$this->customer_id,
            'invoice_no'=>$this->invoice_no,
            'current_due'=> $curr_due,
            'current_advance'=>$current_pay,
            'previous_due'=>$validateData['previous_due'],
            'previous_advance'=>$this->advance_payment,
            'paid_amount'=>$validateData['payment'],
            'payment_by'=>$validateData['payment_by'],
            'bank_title'=>$validateData['bank_title'],
            'date'=>$validateData['date'],
            'remarks'=>$validateData['remarks'],
           
        ]);
        
        //Update customer info
        customer::where('id', $this->customer_id)->update([
            'name' => $this->customer_name,
            'address' => $this->address,
            'mobile' => $this->mobile,
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

        

        $notification=array('msg' => 'Collection Successfully Inserted!', 'alert-type' => 'success');
        return redirect()->route('collection.create')->with($notification);

    }

    // payment search
   public function paymentSearch($value)
   {
    //dd($value);

    if($value == 'Bank')
    {

        //dd('Bank');
      $this->bank_list = 1;
    }
    elseif($value == 'Cheque')
    {
     
        $this->bank_list = 2;

    }

   }

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
        return view('livewire.account.collection.index',  get_defined_vars());
       
    }
}
