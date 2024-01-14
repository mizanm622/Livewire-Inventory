<?php

namespace App\Livewire\Purchase;

use App\Models\Bank;
use App\Models\Brand;
use App\Models\PurchaseProduct;
use App\Models\PurchaseSupplierInfo;
use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\ProductStore;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Checkout extends Component
{



    //public $code;
    //public $name;
    //public $price_rate;
   // public $mrp_rate;
   // public $quantity;
    public $price_discount;
    public $vat_discount;
    //public $id;
   // public $qty;
   // public $p_qty = 1;
   // public $searches;
    //public $supplier_id;
    //public $previous_due;
    //public $date;
    //public $warehouse_id;
    public $transport_no;
    public $delivery_man;
    //public $prepare;
    public $remarks;
    //public $rowId;
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
    session()->flash('supplier');
    session()->flash('pre_due');
    session()->flash('adv_pay');
    return redirect()->route('live.purchase.create');
   }

   // calceal order
   public function cancel()
   {
    Cart::instance('purchase')->destroy();
    session()->flash('supplier');
    session()->flash('pre_due');
    session()->flash('adv_pay');
    return redirect()->route('live.purchase.create');
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

    // //search supplier info from here
    // public function supplierSearch($value)
    // {
    //     $this->supplier_id = $value;

    // }

    //Purchase store from here
    public function purchaseStore()
    {
        //auto generated invoice and purchase code
        //$invoice_no = mt_rand(111111,999999);
        $purchase_code = mt_rand(1111,9999);


        $validateData = $this->validate();
        $value = Session::get('supplier');

       // dd($validateData,$this->total_discount,$this->total_vat, $value );



        if(Cart::instance('purchase')->count()>0)
        {
           foreach(Cart::instance('purchase')-> content() as $product)
           {
                $this->total_qty+=$product->qty;
                $this->product_discount+=$product->options->discount;
                foreach( Session::get('supplier') as $value)
                {

                    PurchaseProduct::insert(
                        [
                            'supplier_id' =>$value['supplier_id'],
                            'invoice_no' =>$value['invoice_no'],
                            'product_id'=>$product->id,
                            'product_code'=>$product->options->code,
                            'purchase_code'=>$purchase_code,
                            'warehouse_id'=>$value['warehouse_id'],
                            'product_name'=>$product->name,
                            'product_price'=>$product->price,
                            'product_quantity'=>$product->qty,
                            'product_weight'=>$product->options->weight,
                            'product_discount'=>$product->options->discount,
                            'sub_total'=>$product->qty*$product->price,
                            'date'=>$value['date'],
                        ]
                    );

                    $product_store = ProductStore::where(
                        [
                            'product_id' => $product->id,
                            'warehouse_id' => $value['warehouse_id']
                        ]
                        )->first();

                    if($product_store)
                    {
                        $product_store->increment('product_quantity',$product->qty+$product->options->discount);
                    }
                    else
                    {
                        ProductStore::create(
                                [
                                    'product_id' =>$product->id,
                                    'brand_id' =>$product->options->brand_id,
                                    'warehouse_id'=>$value['warehouse_id'],
                                    'product_name'=>$product->name,
                                    'product_code'=>$product->options->code,
                                    'product_quantity'=>$product->qty+$product->options->discount,
                                    'purchase_price'=>$product->price,
                                ]
                            );
                    }
                }
            }
        }

        if(session()->has('supplier'))
        {
            foreach (Session::get('supplier') as $value)
            {
                 // if advance payment remain then current due store into advance payment field
                if($validateData['current_due']<0)
                {
                    $cur_due = Null;
                    $adv_payment = abs($validateData['current_due']);

                    Supplier::where('id',$value['supplier_id'])->update([
                        'advance_payment' => abs($validateData['current_due']),
                        'previous_due' => Null
                    ]);
                }
                elseif($validateData['current_due'] == 0)
                {
                    $cur_due = Null;
                    $adv_payment = Null;

                    Supplier::where('id',$value['supplier_id'])->update([
                        'previous_due' => Null,
                        'advance_payment' => Null
                    ]);

                }
                else
                {
                    $cur_due = $validateData['current_due'];
                    $adv_payment = Null;

                    Supplier::where('id',$value['supplier_id'])->update([
                        'previous_due' => $validateData['current_due'],
                        'advance_payment' => Null
                    ]);
                }

                PurchaseSupplierInfo::insert([
                    'supplier_id'=>$value['supplier_id'],
                    'total_price'=>Cart::instance('purchase')->total()-Cart::instance('purchase')->tax(),
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
                    'warehouse_id'=>$value['warehouse_id'],
                    'transport_no'=>$value['transport_no'],
                    'delivery_man'=>$value['delivery_man'],
                    'invoice_no'=>$value['invoice_no'],
                    'remarks'=>$validateData['remarks']
                ]);



                //update supplier info
                Supplier::where('id', $value['supplier_id'])->update([
                    'company_name' => $value['supplier_name'],
                    'address' => $value['address'],
                    'mobile' =>$value['mobile'],
               ]);


            }
        }

        // clear all session
        Cart::instance('purchase')->destroy();
        session()->flash('supplier');
        session()->flash('pre_due');
        session()->flash('adv_pay');

        $notification=array('msg' => 'Order Successfully Submited!', 'alert-type' => 'info');
        return redirect()->route('live.purchase.create')->with($notification);

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

        // get previous due from session

            //dd('session here');
        $adv_pay = Session::get('adv_pay');
        $pre_due = Session::get('pre_due');
        if($pre_due || $adv_pay)
            {
                $this->grand_total=Cart::instance('purchase')->total();

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
                         $this->grand_total-=$this->vat_discount;

                     }
                     else
                     {
                         //dd($this->discount."%");
                         $total = $this->grand_total;
                         $this->total_vat = $total*$this->vat_discount/100;
                         $this->grand_total-=$this->total_vat;
                         //$this->vat_discount=$dis;

                         //dd($this->total_vat);

                     }
                 }
                //ocarring calculation
                if($this->carring)
                {
                    $this->grand_total-=$this->carring;
                }
                //other charge calculation
                if($this->other_charge)
                {
                    $this->grand_total-=$this->other_charge;
                }
                //payment calculation
                // if($this->payment)
                // {
                //     $this->current_due = $this->grand_total+$pre_due-$this->payment;
                // }
                // else
                // {
                //     $this->current_due = $this->grand_total+$pre_due;
                // }

                if($this->payment)
                {
                    if(empty($adv_pay))
                    {
                        $this->current_due = $this->grand_total-$this->payment+$pre_due;
                    }
                    else
                    {
                        $this->current_due = $this->grand_total-$this->payment-$adv_pay;
                    }
                }
                else
                {
                    if(empty($adv_pay))
                    {
                        $this->current_due = $this->grand_total+$pre_due;
                    }
                    else
                    {
                        $this->current_due = $this->grand_total-$adv_pay;
                    }

                }

        }
        else
            {

                //dd('without Session');
                $this->grand_total=Cart::instance('purchase')->total();

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
                         $this->grand_total-=$this->vat_discount;

                     }
                     else
                     {
                         //dd($this->discount."%");
                         $total = $this->grand_total;
                         $this->total_vat = $total*$this->vat_discount/100;
                         $this->grand_total-=$this->total_vat;
                         //$this->vat_discount=$dis;

                         //dd($this->total_vat);

                     }
                 }

                //ocarring calculation
                if($this->carring)
                {
                    $this->grand_total-=$this->carring;
                }
                //other charge calculation
                if($this->other_charge)
                {
                    $this->grand_total-=$this->other_charge;
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
        $suppliers_info = Session::get('supplier');
        $suppliers = Supplier::get();
        $warehouses = Warehouse::get();
        $brands = Brand::get();
        return view('livewire.purchase.checkout', get_defined_vars())
        ->extends('layouts.admin')
        ->section('main-content');

    }
}
