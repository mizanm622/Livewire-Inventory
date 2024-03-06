<?php

namespace App\Livewire\Purchase;

use App\Models\Brand;
use App\Models\Product;
use App\Models\PurchaseProduct;
use App\Models\Store;
use App\Models\Supplier;
use App\Models\Warehouse;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $supplier_search;
    public $supplier_name;
    public $supplier_id;
    public $search, $brand_id;
    public $new_search;
    public $searches;
    public $customer_id;
    public $previous_due;
    public $advance_pay;
    public $date;
    public $warehouse_id;
    public $product_store_id;
    public $transport_no;
    public $delivery_man;
    public $address;
    public $mobile;
    public $invoice_no;
    public $warehouse_name;
    public $last_inv_no;



    public function rules()
    {
        return
        [
            'previous_due' => ['nullable'],
            'date' => ['nullable'],
            'warehouse_id' => ['nullable'],
            'product_store_id' => ['required'],
            'transport_no' => ['nullable'],
            'delivery_man' => ['nullable'],
            'invoice_no' => ['nullable'],
        ];

    }

     public function mount()
    {
        // Set the initial date when the component is mounted
        $this->date = now()->toDateString();

    }

    //Increment cart product
   public function updateQuantity($id, $quantities)
   {

    foreach(Cart::instance('purchase')->content() as $item)
    {
        if($item->id == $id)
        {
            $item->qty = $quantities;
        }
    }

   // $this->dispatch('refresh');
   }

   //Increment cart product
   public function updateDiscount($id, $discounts)
   {

    foreach(Cart::instance('purchase')->content() as $item)
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
    foreach(Cart::instance('purchase')->content() as $item)
    {
        if($item->id == $id)
        {
            $item->price = $update_price;
        }
    }

    //$this->dispatch('refresh');
   }


   //remove product from cart
   public function itemRemove($rowId)
   {

    $cart = Cart::instance('purchase')->content()->where('rowId',$rowId);
    if($cart->isNotEmpty()){
        Cart::instance('purchase')->remove($rowId);
    }
   }

    // add product to purchase cart
    public function sessionStore($id)
    {

        $products = Product::where('id', $id)->first();
         Cart::instance('purchase')->add([
        'id' =>  $products->id,
        'name' =>$products->name,
        'qty' => 1,
        'price' => $products->purches_rate,
        'options' => ['code' => $products->code, 'discount'=> 0, 'weight'=>$products->weight, 'brand_id' =>$products->brand_id, 'type' => $products->type ]
        ]);

    }


    //canceal order
    public function canceal()
    {
        Cart::instance('purchase')->destroy();
        session()->flash('supplier');
        session()->flash('pre_due');
        session()->flash('adv_pay');
        return redirect()->route('live.purchase.create');
    }

     //warehouse search
     public function warehouseSearch($value)
     {
         $this->warehouse_id = $value;
         $this->warehouse_name = Warehouse::find($this->warehouse_id)->name;
     }
     // store supplier info into session
   public function supplierInfo()
   {


    $validateData = $this->validate();

    $store_name = Store::find($validateData['product_store_id'])->name;
    //dd( $validateData);

    $supplier = session()->get('supplier');
        if(!$supplier){
            $supplier = [
            $this->supplier_id=> [
                'supplier_id' => $this->supplier_id,
                'supplier_name' => $this->supplier_name,
                'address' => $this->address,
                'mobile' =>  $this->mobile,
                'previous_due' =>  $this->previous_due,
                'advance_pay' =>  $this->advance_pay,
                'date'=>$validateData['date'],
                'warehouse_id'=>$validateData['warehouse_id'],
                'product_store_id'=>$validateData['product_store_id'],
                'product_store_name'=>$store_name,
                'warehouse_name'=> $this->warehouse_name,
                'invoice_no'=>$this->last_inv_no,
                'transport_no'=>$validateData['transport_no'],
                'delivery_man'=>$validateData['delivery_man'],
                ]
            ];

           session()->put('supplier',  $supplier);

         }
         else
         {
            //previous session delete
            //session()->flash('status');

            if(!$supplier){
                $supplier = [
                $this->supplier_id=> [
                    'supplier_id' => $this->supplier_id,
                    'supplier_name' => $this->supplier_name,
                    'address' => $this->address,
                    'mobile' =>  $this->mobile,
                    'previous_due' =>  $this->previous_due,
                    'advance_pay' =>  $this->advance_pay,
                    'date'=>$validateData['date'],
                    'warehouse_id'=>$validateData['warehouse_id'],
                    'product_store_id'=>$validateData['product_store_id'],
                    'product_store_name'=>$store_name,
                    'warehouse_name'=> $this->warehouse_name,
                    'invoice_no'=>$validateData['invoice_no'],
                    'transport_no'=>$validateData['transport_no'],
                    'delivery_man'=>$validateData['delivery_man'],
                    ]
                ];

               session()->put('supplier',  $supplier);

             }

         }
         return redirect()->route('live.purchase.checkout');

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

            $pre_due = session()->get('pre_due');
            $adv_pay = session()->get('adv_pay');

            $suppliers = Supplier::find($this->supplier_search);
                $this->supplier_name = $suppliers->company_name;
                $this->previous_due = $suppliers->previous_due;
                $this->advance_pay = $suppliers->advance_payment;

                $this->address = $suppliers->address;
                $this->mobile = $suppliers->mobile;
                $this->supplier_id = $suppliers->id;

                if($suppliers->previous_due != 0)
                {
                    session()->put('pre_due',$suppliers->previous_due);
                }
                elseif($suppliers->advance_payment != 0)
                {

                    session()->put('adv_pay',$suppliers->advance_payment);
                }
                // if($suppliers->previous_due == 0)
                // {

                // }
                // else
                // {
                //     $pre_due = $suppliers->previous_due;
                //     session()->put('pre_due',$pre_due);
                // }

                $inv_no = PurchaseProduct::orderBy('id','DESC')->first();
                if(!$inv_no)
                {
                    $this->last_inv_no= 01;
                }
                else
                {
                    $this->last_inv_no = $inv_no->invoice_no+1;
                }
        }


        if(!empty( $this->brand_id))
        {
            $products = Product::where('brand_id',$this->brand_id)->get();
            if($this->brand_id == '0')
            {
                $products = Product::latest()->get();
            }
        }
        else
        {
            if(!empty($this->new_search))
            {
              $this->searches = Product::where('name','Like',"%{$this->new_search}%")
                ->orWhere('code','Like',"%{$this->new_search}%")
                ->limit(3)->get();
            }
            else
            {
                $this->searches =0;
            }

            $products = Product::where('name','Like',"%{$this->search}%")
            ->orWhere('code','Like',"%{$this->search}%")
            ->get();
        }



        $stores = Store::where('status',1)->get();
        $suppliers = Supplier::get();
        $warehouses = Warehouse::where('status',1)->get();
        $purchases = PurchaseProduct::latest()->get();
        $brands = Brand::get();
        return view('livewire.purchase.index', get_defined_vars())
         ->extends('layouts.admin')
         ->section('main-content');
    }

}
