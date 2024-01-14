<?php

namespace App\Livewire\FollowUpdate\Supplier;

use App\Models\Supplier;
use App\Models\SupplierFollowUpdate;
use Livewire\Component;

class Index extends Component
{
    public $date;
    public $supplier_id;
    public $company_name;
    public $address;
    public $mobile;
    public $previous_due;
    public $current_due;
    public $advance_payment;
    public $remarks;
    public $payment;


    public function rules()
    {
        return
        [
            'date' => ['required'],
            'company_name' => ['required'],
            'address' => ['nullable'],
            'mobile' => ['nullable'],
            'previous_due' => ['nullable'],
            'remarks' => ['nullable'],
            'payment' => ['nullable'],
        ];

    }




    // search customer
    public function searchSupplier($id)
    {

        $supplier = Supplier::where('id',$id)->first();

        $this->supplier_id =  $supplier->id;
        $this->company_name =  $supplier->company_name;
        $this->address =  $supplier->address;
        $this->mobile =  $supplier->mobile;
        $this->previous_due =  $supplier->previous_due;
        $this->advance_payment =  $supplier->advance_payment;

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

    public function storeSupplierFollowUpdate()
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
        
        SupplierFollowUpdate::insert([
            'supplier_id'=>$this->supplier_id,
            'current_due'=> $curr_due,
            'current_advance'=>$current_pay,
            'previous_due'=>$validateData['previous_due'],
            'previous_advance'=>$this->advance_payment,
            'paid_amount'=>$validateData['payment'],
            'date'=>$validateData['date'],
            'remarks'=>$validateData['remarks'],
           
        ]);

         //update customer info
         Supplier::where('id',$this->supplier_id)->update([
            'company_name' => $validateData['company_name'],
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
                Supplier::where('id',$this->supplier_id)->update([
                    'advance_payment' =>abs($this->current_due),
                    'previous_due' =>Null,  
                ]);  
            }
            else
            {
                if($this->current_due == 0)
                {
                    Supplier::where('id',$this->supplier_id)->update([
                        'previous_due' =>Null
                    ]);
                }
                else
                {

                    Supplier::where('id',$this->supplier_id)->update([
                        'previous_due' =>$this->current_due 
                    ]);
                }
                 //update Supplier previous due
            }
           
        }
        elseif($this->advance_payment)
        {
            Supplier::where('id',$this->supplier_id)->update([
                'advance_payment' =>$this->current_due 
            ]);
           
        }
        else
        {
            Supplier::where('id',$this->supplier_id)->update([
                'advance_payment' =>$this->current_due 
            ]);
        }

        

        $notification=array('msg' => 'Supplier Follow Update Successfully Inserted!', 'alert-type' => 'success');
        return redirect()->route('supplier.follow.create')->with($notification);

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


            $suppliers = Supplier::get();

        return view('livewire.follow-update.supplier.index', get_defined_vars());
    }
}
