<?php

namespace App\Livewire\PurchaseReturn;

use App\Models\Brand;
use App\Models\customer;
use App\Models\PriceGroupProduct;
use App\Models\Product;
use App\Models\ProductStore;
use App\Models\PurchaseProduct;
use App\Models\ReturnPurchaseProduct;
use App\Models\SalesProduct;
use App\Models\Store;
use App\Models\Supplier;
use App\Models\Warehouse;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Index extends Component
{
    public $search, $brand_id;
    public $new_search;
    public $searches;
    public $supplier_id;
    public $previous_due;
    public $advance_pay;
    public $date;
    public $product_store_id;
    public $transport_no;
    public $delivery_man;
    public $supplier_search;
    public $supplier_name;
    public $address;
    public $mobile;
    public $invoice_no;
    public $product_store_name;
    public $return_invoice_no;
    public $purchase_invoice_no;
    public $price_group_id;
    public $stock_out;
    public $products;
    public $warehouse_id;
    public $warehouse_name;
    public $remarks;





    public function rules()
    {
        return
        [
            'remarks' => ['nullable'],
            'previous_due' => ['nullable'],
            'date' => ['nullable'],
            'product_store_id' => ['nullable'],
            'transport_no' => ['nullable'],
            'delivery_man' => ['nullable'],
            'invoice_no' => ['nullable'],
        ];

    }

    // public function mount()
    // {
    //     // Set the initial date when the component is mounted
    //     $this->date = now()->toDateString();

    // }


    //Increment cart product
   public function updateQuantity($id, $store, $quantities)
   {
    //dd($id, $warehouse, $quantities);

   $result =  ProductStore::where('product_id', $id)->where('product_store_id', $store)->where('product_quantity', '>=', $quantities)->first();


        foreach(Cart::instance('purchase_return')->content() as $item)
        {
            if($result)
            {
                if($item->id == $id)
                {
                    $item->qty = $quantities;
                    $item->options->stock = 1;
                }
            }
            else
            {
                if($item->id == $id)
                {
                    $item->options->stock = 0;

                }
            }
        }



    //$this->dispatch('refresh');
   }

   //Increment cart product
   public function updateDiscount($id, $discounts)
   {

    foreach(Cart::instance('purchase_return')->content() as $item)
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
    foreach(Cart::instance('purchase_return')->content() as $item)
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

    $cart = Cart::instance('purchase_return')->content()->where('rowId',$rowId);
    if($cart->isNotEmpty()){
        Cart::remove($rowId);
    }
   }

   public function dateSearch($date)
   {

    $this->date = $date;
   }

    // add product to sales cart
    public function sessionStore($id)
    {
        //dd($id);

        $products = ProductStore::where('product_id',$id)->first();


        $purchase = PurchaseProduct::where('product_id',$id)->where('date', $this->date)->first();

            Cart::instance('purchase_return')->add([
                'id' =>  $products->product_id,
                'name' =>$products->product_name,
                'qty' => 1,
                'price' => $purchase->product_price ?? $products->product->price_rate,
                'options' => ['code' => $products->product_code, 'weight'=>$purchase->product_weight, 'product_store_id'=>$products->product_store_id, 'stock' => 1 , 'type'=> $products->product->type]
                ]);

    }


    //canceal order
    public function canceal()
    {
        Cart::instance('purchase_return')->destroy();
        session()->flash('return_supplier');
        session()->flash('return_old_due');
        session()->flash('return_adv_pay');
        return redirect()->route('live.purchase.return.create');
    }

     //warehouse search
     public function productSearch($value)
     {

        if($value == 0)
        {

        }
        else
        {
            $this->product_store_id = $value;
            $this->product_store_name = Store::find($value)->name;
        }

     }
     // store supplier info into session
   public function supplierInfo()
   {
    $validateData = $this->validate();

    $return_supplier = session()->get('return_supplier');
        if(!$return_supplier){
            $return_supplier = [
            $this->supplier_id=> [
                'supplier_id' => $this->supplier_id,
                'supplier_name' => $this->supplier_name,
                'address' => $this->address,
                'mobile' =>  $this->mobile,
                'previous_due' =>  $this->previous_due,
                'advance_pay' =>  $this->advance_pay,
                'purchase_date'=>$validateData['date'],
                'return_date'=>date('Y-m-d'),
                'warehouse_id'=>$this->warehouse_id,
                'warehouse_name'=> $this->warehouse_name,
                'product_store_id'=>$validateData['product_store_id'],
                'product_store_name'=> $this->product_store_name,
                'return_invoice_no'=>$this->return_invoice_no,
                'purchase_invoice_no'=>$this->purchase_invoice_no,
                'transport_no'=>$validateData['transport_no'],
                'delivery_man'=>$validateData['delivery_man'],
                'remarks'=>$validateData['remarks'],
                ]
            ];

           session()->put('return_supplier',  $return_supplier);

         }
         else
         {
            //previous session delete
            //session()->flash('status');

            if(!$return_supplier){
                $return_supplier = [
                $this->supplier_id=> [
                    'supplier_id' => $this->supplier_id,
                    'supplier_name' => $this->supplier_name,
                    'address' => $this->address,
                    'mobile' =>  $this->mobile,
                    'previous_due' =>  $this->previous_due,
                    'advance_pay' =>  $this->advance_pay,
                    'purchase_date'=>$validateData['date'],
                    'return_date'=>date('Y-m-d'),
                    'warehouse_id'=>$this->warehouse_id,
                    'warehouse_name'=> $this->warehouse_name,
                    'product_store_id'=>$validateData['product_store_id'],
                    'product_store_name'=> $this->product_store_name,
                    'return_invoice_no'=>$this->return_invoice_no,
                    'purchase_invoice_no'=>$this->purchase_invoice_no,
                    'transport_no'=>$validateData['transport_no'],
                    'delivery_man'=>$validateData['delivery_man'],
                    'remarks'=>$validateData['remarks'],
                    ]
                ];
               session()->put('return_supplier',  $return_supplier);

             }

         }
         return redirect()->route('live.purchase.return.checkout');

   }

   // brand wise search
    public function brandSearch($value)
    {
        $this->brand_id = $value;
    }


    public function render()
    {

        if($this->supplier_search)
        {

            $return_old_due = session()->get('return_old_due');
            $return_adv_pay = session()->get('return_adv_pay');

            $suppliers = Supplier::find($this->supplier_search);
                $this->supplier_name = $suppliers->company_name;

                $this->previous_due = $suppliers->previous_due;
                $this->advance_pay = $suppliers->advance_payment;
                $this->address = $suppliers->address;
                $this->mobile = $suppliers->mobile;
                $this->supplier_id = $suppliers->id;

                if($this->date)
                {
                    $value = PurchaseProduct::where('supplier_id',$this->supplier_search)->where('date', $this->date)->first();
                    if($value)
                    {
                        $this->purchase_invoice_no = $value->invoice_no;
                        $this->warehouse_id = $value->warehouse_id;
                        $this->product_store_id = $value->product_store_id;

                        $this->product_store_name = Store::where('id', $this->product_store_id)->value('name');
                        $this->warehouse_name = Warehouse::where('id', $this->warehouse_id)->value('name');
                    }
                    else
                    {

                    }

                }


                if($suppliers->previous_due != 0)
                {
                    session()->put('return_old_due',$suppliers->previous_due);
                }
                elseif($suppliers->advance_payment != 0)
                {

                    session()->put('return_adv_pay',$suppliers->advance_payment);
                }

                $return_invoice_no = ReturnPurchaseProduct::orderBy('id','DESC')->first();
                if(!$return_invoice_no)
                {
                    $this->return_invoice_no= 01;
                }
                else
                {
                    $this->return_invoice_no = $return_invoice_no->return_invoice_no+1;
                }
        }


        if( $this->supplier_search && $this->date)
        {

            // brand wise product search
            $this->products = PurchaseProduct::where('supplier_id',$this->supplier_search)->where('date',  $this->date)->get();



            // if($this->brand_id && $this->product_store_id)
            //     {
            //         $this->products = ProductStore::where('product_store_id',$this->product_store_id)
            //         ->where('brand_id',$this->brand_id)
            //         ->get();
            //     }
            // elseif($this->search && $this->product_store_id)
            //     {
            //         $this->products = ProductStore::where('product_store_id',$this->product_store_id)
            //         ->where('product_name','Like',"%{$this->search}%")
            //         ->orWhere('product_code','Like',"%{$this->search}%")
            //         ->get();
            //     }

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





        $suppliers = Supplier::get();
        $stores = Store::get();
        $brands = Brand::get();
        return view('livewire.purchase-return.index',get_defined_vars())
        ->extends('layouts.admin')
        ->section('main-content');
    }
}
