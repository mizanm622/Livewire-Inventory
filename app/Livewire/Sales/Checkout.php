<?php

namespace App\Livewire\Sales;

use App\Models\Bank;
use App\Models\Brand;
use App\Models\customer;
use App\Models\SalesCustomerInfo;
use App\Models\SalesProduct;
use App\Models\Warehouse;
use App\Models\ProductStore;
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
    public $bank_title;
    public $total_vat;
    public $total_discount;
    public $total_amount_after_discount;


    public function rules()
    {
        return
        [
            'carring' => ['nullable'],
            'other_charge' => ['nullable'],
            'payment_by' => ['nullable'],
            'bank_title' => ['nullable'],
            'payment' => ['nullable'],
            'current_due' => ['nullable'],
            'transport_no' => ['nullable'],
            'delivery_man' => ['nullable'],
            'remarks' => ['nullable'],
        ];

    }

    // redirect page
   public function back()
   {
    session()->flash('customer');
    session()->flash('sales_old_due');
    session()->flash('sales_adv_pay');
    return redirect()->route('live.sales.create');
   }

   // calceal order
   public function cancel()
   {
    Cart::instance('salse')->destroy();
    session()->flash('customer');
    session()->flash('sales_old_due');
    session()->flash('sales_adv_pay');
    return redirect()->route('live.sales.create');
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
    else
    {


    }

   }

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

        $invoice = 0;
         //check salse
        if(Cart::instance('salse')->count()>0)
        {
           foreach(Cart::instance('salse')->content() as $product)
           {
                $this->total_qty+=$product->qty;
                $this->product_discount+=$product->options->discount;
                $this->total_amount_after_discount += ($product->qty-$product->options->discount)*$product->price;
                foreach( Session::get('customer') as $value)
                {
                    $invoice = $value['invoice_no'];

                    SalesProduct::insert([
                        'customer_id' =>$value['customer_id'],
                        'invoice_no' =>$value['invoice_no'],
                        'product_id'=>$product->id,
                        'product_code'=>$product->options->code,
                        'purchase_code'=>$purchase_code,
                        'product_store_id'=>$value['product_store_id'],
                        'product_name'=>$product->name,
                        'product_price'=>$product->price,
                        'product_quantity'=>$product->qty,
                        'product_weight'=>$product->options->weight,
                        'product_discount'=>$product->options->discount,
                        'sub_total'=>($product->qty-$product->options->discount)*$product->price,
                        'date'=>$value['date'],
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
                            $product_store->decrement('product_quantity',$product->qty+$product->options->discount);
                        }

                }
            }
        }

        if(session()->has('customer'))
        {
            foreach (Session::get('customer') as $value)
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


                SalesCustomerInfo::insert([
                    'customer_id'=>$value['customer_id'],
                    'total_price'=>$this->total_amount_after_discount,
                    'total_qty'=> $this->total_qty,
                    'product_discount'=>$this->product_discount,
                    'price_discount'=>$this->total_discount,
                    'vat'=>$this->total_vat,
                    'old_due'=> $value['previous_due'],
                    'current_due'=>$cur_due,
                    'advance_payment'=>$adv_payment,
                    'carring'=>$validateData['carring'],
                    'other_charge'=>$validateData['other_charge'],
                    'payment_by'=>$validateData['payment_by'],
                    'bank_title'=>$validateData['bank_title'],
                    'payment'=>$validateData['payment'],
                    'date'=>$value['date'],
                    'product_store_id'=>$value['product_store_id'],
                    'transport_no'=>$value['transport_no'],
                    'delivery_man'=>$value['delivery_man'],
                    'invoice_no'=>$value['invoice_no'],
                    'remarks'=>$validateData['remarks']
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
        Cart::instance('salse')->destroy();
        session()->flash('customer');
        session()->flash('sales_old_due');
        session()->flash('sales_adv_pay');

        $notification=array('msg' => 'Order Successfully Submited!', 'alert-type' => 'info');
        return redirect()->route('sales.invoice',$invoice)->with($notification);
       
    }

    //get discount status
    public function discountType($val)
    {

       $this->discount_status = $val;

    }

    //get vat status
    public function vatType($val)
    {

       $this->vat_status = $val;

    }

    public function render()
    {

        $sales_old_due = Session::get('sales_old_due');
        $sales_adv_pay = Session::get('sales_adv_pay');
        // get previous due from session

            //dd('session here');

            if($sales_old_due || $sales_adv_pay)
            {
                //dd($sales_adv_pay, $sales_old_due);
              

                $total_amount =0;
                foreach(Cart::instance('salse')-> content() as $product)
                {
                    $total_amount += ($product->qty-$product->options->discount)*$product->price;

                }
                $this->grand_total=$total_amount;

                //discount calculation
                if($this->discount_status)
                {

                    if($this->discount_status == 1)
                    {
                        //dd($this->discount."tk");
                        $this->total_discount = $this->price_discount;
                        $this->grand_total-=$this->price_discount;
                    }
                    else
                    {
                        //dd($this->discount."%");
                        $total = $this->grand_total;

                        $this->total_discount = $total*$this->price_discount/100;

                        $this->grand_total-=$this->total_discount ;



                    }
                }

                 //vat discount calculation
                 if($this->vat_status)
                 {

                     if($this->vat_status == 1)
                     {
                         //dd($this->discount."tk");
                         $this->total_vat = $this->vat_discount;
                         $this->grand_total+=$this->vat_discount;

                     }
                     else
                     {
                         //dd($this->discount."%");
                         $total = $this->grand_total;
                         $this->total_vat = $total*$this->vat_discount/100;
                         $this->grand_total+=$this->total_vat;
                         //$this->vat_discount=$dis;

                         //dd($this->total_vat);

                     }
                 }
                //ocarring calculation
                if($this->carring)
                {
                    $this->grand_total+=$this->carring;
                }
                //other charge calculation
                if($this->other_charge)
                {
                    $this->grand_total+=$this->other_charge;
                }
                //payment calculation
                if($this->payment)
                {
                    if(empty($sales_adv_pay))
                    {
                        $this->current_due = $this->grand_total-$this->payment+$sales_old_due;
                    }
                    else
                    {
                        $this->current_due = $this->grand_total-$this->payment-$sales_adv_pay;
                    }
                }
                else
                {
                    if(empty($sales_adv_pay))
                    {
                        $this->current_due = $this->grand_total+$sales_old_due;
                    }
                    else
                    {
                        $this->current_due = $this->grand_total-$sales_adv_pay;
                    }

                }
            }

        else
            {

                //dd('without Session');
                $total_amount =0;
                foreach(Cart::instance('salse')-> content() as $product)
                {
                    $total_amount += ($product->qty-$product->options->discount)*$product->price;

                }
                $this->grand_total=$total_amount;

                //discount calculation
                if($this->discount_status)
                {

                    if($this->discount_status == 1)
                    {
                        //dd($this->discount."tk");
                        $this->total_discount = $this->price_discount;
                        $this->grand_total-=$this->price_discount;
                    }
                    else
                    {
                        //dd($this->discount."%");
                        $total = $this->grand_total;

                        $this->total_discount = $total*$this->price_discount/100;

                        $this->grand_total-=$this->total_discount ;



                    }
                }

                 //vat discount calculation
                 if($this->vat_status)
                 {

                     if($this->vat_status == 1)
                     {
                         //dd($this->discount."tk");
                         $this->total_vat = $this->vat_discount;
                         $this->grand_total+=$this->vat_discount;

                     }
                     else
                     {
                         //dd($this->discount."%");
                         $total = $this->grand_total;
                         $this->total_vat = $total*$this->vat_discount/100;
                         $this->grand_total+=$this->total_vat;
                         //$this->vat_discount=$dis;

                         //dd($this->total_vat);

                     }
                 }

                //ocarring calculation
                if($this->carring)
                {
                    $this->grand_total+=$this->carring;
                }
                //other charge calculation
                if($this->other_charge)
                {
                    $this->grand_total+=$this->other_charge;
                }

                //price discount calculation

                 //payment check
                 if($this->payment)
                    {
                        $this->current_due = $this->grand_total-$this->payment;
                    }
                    else
                    {
                        $this->current_due = $this->grand_total;
                    }

            }



        $banks = Bank::get();
        $customers_info = Session::get('customer');
        //$this->previous_due =
        $customers = customer::get();
        $warehouses = Warehouse::get();
        $brands = Brand::get();
        return view('livewire.sales.checkout', get_defined_vars())
        ->extends('layouts.admin')
        ->section('main-content');

    }
}
