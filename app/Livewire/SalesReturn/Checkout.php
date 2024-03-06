<?php

namespace App\Livewire\SalesReturn;

use App\Models\customer;
use App\Models\ProductStore;
use App\Models\ReturnCustomerInfo;
use App\Models\ReturnSalesProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Checkout extends Component
{
    public $price_discount;
    public $vat_discount;
    public $date;
    public $product_store_id;
    public $transport_no;
    public $delivery_man;
    public $remarks;
    public $grand_total = 0;
    public $carring;
    public $other_charge;
    public $payment_by;
    public $payment;
    public $current_due;
    public $product_discount;
    public $old_due;
    public $total_qty;
    public $bank_list;
    public $discount_status;
    public $vat_status;



    public function rules()
    {
        return
        [
            'carring' => ['nullable'],
            'other_charge' => ['nullable'],
            'current_due' => ['nullable'],
            'remarks' => ['nullable'],
        ];

    }

    // redirect page
   public function back()
   {
    session()->flash('return_customer');
    session()->flash('sales_return_old_due');
    session()->flash('sales_return_adv_pay');
    return redirect()->route('live.sales.return.create');
   }

   // calceal order
   public function cancel()
   {
    Cart::instance('sales_return')->destroy();
    session()->flash('return_customer');
    session()->flash('sales_return_old_due');
    session()->flash('sales_return_adv_pay');

    return redirect()->route('live.sales.return.create');
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
//     else
//     {


//     }

//    }

    //search supplier info from here
    public function customerSearch($value)
    {
        $this->customer_id = $value;

    }

    //Purchase store from here
    public function salesStore()
    {
        //auto generated invoice and purchase code
        //$invoice_no = mt_rand(111111,999999);
        $purchase_code = mt_rand(1111,9999);


        $validateData = $this->validate();



        //dd($validateData,$this->total_discount,$this->total_vat, $value, $sales_adv_pay);


         //check salse
        if(Cart::instance('sales_return')->count()>0)
        {
           foreach(Cart::instance('sales_return')->content() as $product)
           {
                $this->total_qty+=$product->qty;
                $this->product_discount+=$product->options->discount;
                foreach( Session::get('return_customer') as $value)
                {

                    ReturnSalesProduct::insert([
                        'customer_id' =>$value['customer_id'],
                        'return_invoice_no' =>$value['return_invoice_no'],
                        'product_id'=>$product->id,
                        'product_code'=>$product->options->code,
                        'purchase_code'=>$purchase_code,
                        'product_store_id'=>$value['product_store_id'],
                        'product_name'=>$product->name,
                        'product_price'=>$product->price,
                        'product_quantity'=>$product->qty,
                        'product_weight'=>$product->options->weight,
                        'sub_total'=>$product->qty*$product->price,
                        'return_date'=>$value['return_date'],
                    ]);


                    // check if the product is exists in this table
                    $product_store = ProductStore::where(
                        [
                        'product_id' => $product->id,
                        'product_store_id' => $value['product_store_id']
                        ]
                        )->first();

                        //if exists then decrement the product quantity
                        if($product_store)
                        {
                            $product_store->increment('product_quantity',$product->qty);
                        }

                }
            }
        }

        if(session()->has('return_customer'))
        {
            foreach (Session::get('return_customer') as $value)
            {
                // if advance payment remain then current due store into advance payment field
                if($validateData['current_due']<0)
                {
                    $cur_due = Null;
                    $adv_payment = abs($validateData['current_due']);

                    customer::where('id',$value['customer_id'])->update([
                        'advance_payment' => abs($validateData['current_due']),
                        'previous_due' => Null
                    ]);
                }
                elseif($validateData['current_due'] == 0)
                {
                    $cur_due = Null;
                    $adv_payment = Null;

                    customer::where('id',$value['customer_id'])->update([
                        'previous_due' => Null,
                        'advance_payment' => Null
                    ]);

                }
                else
                {
                    $cur_due = $validateData['current_due'];
                    $adv_payment = Null;

                    customer::where('id',$value['customer_id'])->update([
                        'previous_due' => $validateData['current_due'],
                        'advance_payment' => Null
                    ]);
                }


                ReturnCustomerInfo::insert([
                    'customer_id'=>$value['customer_id'],
                    'total_price'=>Cart::instance('sales_return')->total()-Cart::instance('sales_return')->tax(),
                    'total_qty'=> $this->total_qty,
                    'old_due'=> $value['previous_due'],
                    'current_due'=>$cur_due,
                    'advance_payment'=>$adv_payment,
                    'carring'=>$validateData['carring'],
                    'other_charge'=>$validateData['other_charge'],
                    'sales_date'=>$value['sales_date'],
                    'return_date'=>$value['return_date'],
                    'product_store_id'=>$value['product_store_id'],
                    'sales_invoice_no'=>$value['sales_invoice_no'],
                    'return_invoice_no'=>$value['return_invoice_no'],
                    'remarks'=>$value['remarks']
                ]);

                //update customer info
                customer::where('id', $value['customer_id'])->update([
                    'name' => $value['customer_name'],
                    'address' => $value['address'],
                    'mobile' => $value['mobile'],
               ]);
            }
        }

        // clear all session in selse cart
        Cart::instance('sales_return')->destroy();
        session()->flash('return_customer');
        session()->flash('sales_return_old_due');
        session()->flash('sales_return_adv_pay');

        $notification=array('msg' => 'Sales Return Successfully Submited!', 'alert-type' => 'info');
        return redirect()->route('live.sales.return.create')->with($notification);

    }

    //get discount status
    // public function discountType($val)
    // {

    //    $this->discount_status = $val;

    // }

    //get vat status
    // public function vatType($val)
    // {

    //    $this->vat_status = $val;

    // }

    public function render()
    {

        $sales_old_due = Session::get('sales_return_old_due');
        $sales_adv_pay = Session::get('sales_return_adv_pay');
        // get previous due from session

            //dd('session here');

            if($sales_old_due || $sales_adv_pay)
            {
                //dd($sales_adv_pay, $sales_old_due);
                $this->grand_total=Cart::instance('sales_return')->total();

                //discount calculation
                // if($this->discount_status)
                // {

                //     if($this->discount_status == 1)
                //     {
                //         //dd($this->discount."tk");
                //         $this->total_discount = $this->price_discount;
                //         $this->grand_total-=$this->price_discount;
                //     }
                //     else
                //     {
                //         //dd($this->discount."%");
                //         $total = $this->grand_total;

                //         $this->total_discount = $total*$this->price_discount/100;

                //         $this->grand_total-=$this->total_discount ;



                //     }
                // }

                 //vat discount calculation
                //  if($this->vat_status)
                //  {

                //      if($this->vat_status == 1)
                //      {
                //          //dd($this->discount."tk");
                //          $this->total_vat = $this->vat_discount;
                //          $this->grand_total+=$this->vat_discount;

                //      }
                //      else
                //      {
                //          //dd($this->discount."%");
                //          $total = $this->grand_total;
                //          $this->total_vat = $total*$this->vat_discount/100;
                //          $this->grand_total+=$this->total_vat;
                //          //$this->vat_discount=$dis;

                //          //dd($this->total_vat);

                //      }
                //  }
                //ocarring calculation
                // if($this->carring)
                // {
                //     $this->grand_total+=$this->carring;

                // }
                // //other charge calculation
                // if($this->other_charge)
                // {
                //     $this->grand_total+=$this->other_charge;
                // }
                //payment calculation
                // if($this->payment)
                // {
                //     if(empty($sales_adv_pay))
                //     {
                //         $this->current_due = $this->grand_total-$this->payment+$sales_old_due;
                //     }
                //     else
                //     {
                //         $this->current_due = $this->grand_total-$this->payment-$sales_adv_pay;
                //     }
                // }
                // else
                // {
                    if(empty($sales_adv_pay))
                    {
                        $this->current_due = $sales_old_due - $this->grand_total;
                        if($this->carring)
                        {
                            $this->current_due+=$this->carring;

                        }
                        //other charge calculation
                        if($this->other_charge)
                        {
                            $this->current_due+=$this->other_charge;

                        }
                    }
                    else
                    {
                        $this->current_due = -$this->grand_total-$sales_adv_pay;
                        if($this->carring)
                        {
                            $this->current_due-=$this->carring;

                        }
                        //other charge calculation
                        if($this->other_charge)
                        {
                            $this->current_due-=$this->other_charge;

                        }
                    }

                // }
            }

        else
            {

                //dd('without Session');
                $this->grand_total=Cart::instance('sales_return')->total();

                //discount calculation
                // if($this->discount_status)
                // {

                //     if($this->discount_status == 1)
                //     {
                //         //dd($this->discount."tk");
                //         $this->total_discount = $this->price_discount;
                //         $this->grand_total-=$this->price_discount;
                //     }
                //     else
                //     {
                //         //dd($this->discount."%");
                //         $total = $this->grand_total;

                //         $this->total_discount = $total*$this->price_discount/100;

                //         $this->grand_total-=$this->total_discount ;



                //     }
                // }

                 //vat discount calculation
                //  if($this->vat_status)
                //  {

                //      if($this->vat_status == 1)
                //      {
                //          //dd($this->discount."tk");
                //          $this->total_vat = $this->vat_discount;
                //          $this->grand_total+=$this->vat_discount;

                //      }
                //      else
                //      {
                //          //dd($this->discount."%");
                //          $total = $this->grand_total;
                //          $this->total_vat = $total*$this->vat_discount/100;
                //          $this->grand_total+=$this->total_vat;
                //          //$this->vat_discount=$dis;

                //          //dd($this->total_vat);

                //      }
                //  }

                $this->current_due = -$this->grand_total;

                //carring calculation
                if($this->carring)
                {
                    $this->current_due+=$this->carring;
                }
                //other charge calculation
                if($this->other_charge)
                {
                    $this->current_due+=$this->other_charge;
                }

                //price discount calculation




            }




        $customers_info = Session::get('customer');
        $customers = customer::get();
        return view('livewire.sales-return.checkout', get_defined_vars())
        ->extends('layouts.admin')
        ->section('main-content');
    }
}
