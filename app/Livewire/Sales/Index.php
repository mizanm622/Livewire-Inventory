<?php

namespace App\Livewire\Sales;

use App\Models\Brand;
use App\Models\customer;
use App\Models\Product;
use App\Models\PurchaseProduct;
use App\Models\SalesProduct;
use App\Models\Warehouse;
use App\Models\ProductStore;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;

    public $search, $brand_id;
    public $new_search;
    public $searches;
    public $customer_id;
    public $previous_due;
    public $advance_pay;
    public $date;
    public $warehouse_id;
    public $transport_no;
    public $delivery_man;
    public $customer_search;
    public $customer_name;
    public $address;
    public $mobile;
    public $invoice_no;
    public $warehouse_name;
    public $last_inv_no;

    public $stock_out;
    public $products;





    public function rules()
    {
        return
        [
            'previous_due' => ['nullable'],
            'date' => ['nullable'],
            'warehouse_id' => ['nullable'],
            'transport_no' => ['nullable'],
            'delivery_man' => ['nullable'],
            'invoice_no' => ['nullable'],
        ];

    }


    //Increment cart product
   public function updateQuantity($id, $warehouse, $quantities)
   {
    //dd($id, $warehouse, $quantities);

   $result =  ProductStore::where('product_id', $id)->where('warehouse_id', $warehouse)->where('product_quantity', '>=', $quantities)->first();

    if($result)
    {
        foreach(Cart::instance('salse')->content() as $item)
        {
            if($item->id == $id)
            {
                $item->qty = $quantities;

            }
            $this->reset('stock_out');
        }
    }
    else
    {
        $this->stock_out = 'Stock Out! only '.ProductStore::where('product_id', $id)->where('warehouse_id', $warehouse)->value('product_quantity').' available';

    }


    //$this->dispatch('refresh');
   }

   //Increment cart product
   public function updateDiscount($id, $discounts)
   {

    foreach(Cart::instance('salse')->content() as $item)
    {
        if($item->id == $id)
        {
            $item->options->discount = $discounts;
        }

    }

    //$this->dispatch('refresh');
   }

   //Increment cart product
   public function updatePrice($id, $update_price)
   {
    foreach(Cart::instance('salse')->content() as $item)
    {
        if($item->id == $id)
        {
            $item->price = $update_price;
        }

    }

   // $this->dispatch('refresh');
   }


   //remove product from cart
   public function itemRemove($rowId)
   {

    $cart = Cart::instance('salse')->content()->where('rowId',$rowId);
    if($cart->isNotEmpty()){
        Cart::remove($rowId);
    }
   }

    // add product to sales cart
    public function sessionStore($id)
    {

        $products = ProductStore::where('product_id',$id)->first();
         Cart::instance('salse')->add([
        'id' =>  $products->product_id,
        'name' =>$products->product_name,
        'qty' => 1,
        'price' => $products->product->price_rate,
        'options' => ['code' => $products->product_code, 'discount'=> 0, 'warehouse_id'=>$products->warehouse_id]
        ]);


    }


    //canceal order
    public function canceal()
    {
        Cart::instance('salse')->destroy();
        session()->flash('customer');
        session()->flash('sales_old_due');
        session()->flash('sales_adv_pay');
        return redirect()->route('live.sales.create');
    }

     //warehouse search
     public function warehouseSearch($value)
     {
        //dd($value);
         $this->warehouse_id = $value;
         $this->warehouse_name = Warehouse::find($this->warehouse_id)->name;

     }
     // store supplier info into session
   public function customerInfo()
   {
    $validateData = $this->validate();

    $customer = session()->get('customer');
        if(!$customer){
            $customer = [
            $this->customer_id=> [
                'customer_id' => $this->customer_id,
                'customer_name' => $this->customer_name,
                'address' => $this->address,
                'mobile' =>  $this->mobile,
                'previous_due' =>  $this->previous_due,
                'advance_pay' =>  $this->advance_pay,
                'date'=>$validateData['date'],
                'warehouse_id'=>$validateData['warehouse_id'],
                'warehouse_name'=> $this->warehouse_name,
                'invoice_no'=>$this->last_inv_no,
                'transport_no'=>$validateData['transport_no'],
                'delivery_man'=>$validateData['delivery_man'],
                ]
            ];

           session()->put('customer',  $customer);

         }
         else
         {
            //previous session delete
            //session()->flash('status');

            if(!$customer){
                $customer = [
                $this->customer_id=> [
                    'customer_id' => $this->customer_id,
                    'customer_name' => $this->customer_name,
                    'address' => $this->address,
                    'mobile' =>  $this->mobile,
                    'previous_due' =>  $this->previous_due,
                    'advance_pay' =>  $this->advance_pay,
                    'date'=>$validateData['date'],
                    'warehouse_id'=>$validateData['warehouse_id'],
                    'warehouse_name'=> $this->warehouse_name,
                    'invoice_no'=>$this->last_inv_no,
                    'transport_no'=>$validateData['transport_no'],
                    'delivery_man'=>$validateData['delivery_man'],
                    ]
                ];
               session()->put('customer',  $customer);

             }

         }
         return redirect()->route('live.sales.checkout');

   }

   // brand wise search
    public function brandSearch($value)
    {
        $this->brand_id = $value;
    }


    public function render()
    {

        if($this->customer_search)
        {

            $sales_old_due = session()->get('sales_old_due');
            $sales_adv_pay = session()->get('sales_adv_pay');

            $customers = customer::find($this->customer_search);
                $this->customer_name = $customers->name;

                $this->previous_due = $customers->previous_due;
                $this->advance_pay = $customers->advance_payment;

                $this->address = $customers->address;
                $this->mobile = $customers->mobile;
                $this->customer_id = $customers->id;
                if($customers->previous_due != 0)
                {
                    session()->put('sales_old_due',$customers->previous_due);
                }
                elseif($customers->advance_payment != 0)
                {

                    session()->put('sales_adv_pay',$customers->advance_payment);
                }

                $inv_no = SalesProduct::orderBy('id','DESC')->first();
                if(!$inv_no)
                {
                    $this->last_inv_no= 01;
                }
                else
                {
                    $this->last_inv_no = $inv_no->invoice_no+1;
                }
        }


        if($this->warehouse_id)
        {

            // brand wise product search
            $this->products = ProductStore::where('warehouse_id',$this->warehouse_id)->get();

            if($this->brand_id && $this->warehouse_id)
                {
                    $this->products = ProductStore::where('warehouse_id',$this->warehouse_id)
                    ->where('brand_id',$this->brand_id)
                    ->get();
                }
            elseif($this->search && $this->warehouse_id)
                {
                    $this->products = ProductStore::where('warehouse_id',$this->warehouse_id)
                    ->where('product_name','Like',"%{$this->search}%")
                    ->orWhere('product_code','Like',"%{$this->search}%")
                    ->get();
                }

        }
        else
        {

            //$this->products = ProductStore::latest()->get();

        }



        // //brand wise product search
        // if(!empty( $this->brand_id))
        // {

        //     $products = Product::where('brand_id',$this->brand_id)->get();

        // }
        // else
        // {

        //    $products = Product::where('name','Like',"%{$this->search}%")
        //     ->orWhere('code','Like',"%{$this->search}%")
        //     ->get();
        // }





        $customers = customer::get();
        $warehouses = Warehouse::get();
        $brands = Brand::get();
        return view('livewire.sales.index', get_defined_vars())
         ->extends('layouts.admin')
         ->section('main-content');
    }

}
