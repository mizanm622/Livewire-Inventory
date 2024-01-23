@extends('layouts.admin')

@section('page-title')
Purchase Invoice
@endsection

@section('main-content')

<link href="{{asset('assets/css/pdf.css')}}" rel="stylesheet">

<div class="container">
    <table class="w-full">
        <tr>
            <td class="w-half">
                <img src="{{ asset('laraveldaily.png') }}" alt="laravel daily" width="200" />
            </td>
            <td class="w-half">
                <h2>Invoice ID: 0000001</h2>
            </td>
        </tr>
    </table>
 
    <div class="margin-top">
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <div><h4>Supplier Address:</h4></div>
                   
                        <div><strong>Name</strong>        :{{$supplier_info->supplier->company_name}}</div>
                        <div><strong>Address</strong>     :{{$supplier_info->supplier->address}}</div>
                        <div><strong>Mobile No.</strong>  :{{$supplier_info->supplier->mobile}}</div>
                        <div><strong>Warehouse:</strong>  :{{$supplier_info->warehouse->name}}</div>
                        <div><strong>Gari No</strong>     :{{$supplier_info->transport_no}}</div>
                        <div><strong>Delivery Men</strong>:{{$supplier_info->delivery_man}}</div>
                        <div><strong>Date</strong>        :{{$supplier_info->date}}</div>
                </td>
                <td class="w-half">
                   
                    <div><strong>Invoice No.</strong>     :{{$supplier_info->invoice_no }}</div>
                    <div><strong>Product Discount</strong>:{{$supplier_info->product_discount = $supplier_info->product_discount ?? ''}}</div>
                    <div><strong>Total Quantity</strong>  :{{$supplier_info->total_qty}} Pcs/Bags</div>
                    <div><strong>Total Price.</strong>    :{{$supplier_info->total_price}}/=</div>
                    <div><strong>Discount Price </strong> :{{$supplier_info->price_discount."/=" ?? ''}}</div>
                    <div><strong>Vat</strong>             :{{$supplier_info->vat.'/=' ?? ''}}</div>
                    <div><strong>Carring Charge</strong>  :{{$supplier_info->carring}}/=</div>
                    <div><strong>Other Charge</strong>    :{{$supplier_info->other_charge}}/=</div>
                    <div><strong>Previous Due:</strong>   :{{$supplier_info->old_due}}/=</div>
                    <div><strong>Grand Total</strong>     :{{$supplier_info->old_due+$supplier_info->total_price-($supplier_info->price_discount+$supplier_info->vat+$supplier_info->carring+$supplier_info->other_charge)}}/=</div>
                    <div><strong>Payment Amount</strong>  :{{$supplier_info->payment}}/=</div>
                    <div><strong>Current Due</strong>     :{{$supplier_info->total_price+$supplier_info->old_due-($supplier_info->price_discount+$supplier_info->vat+$supplier_info->carring+$supplier_info->other_charge+$supplier_info->payment)}}/=</div>
                </td>
            </tr>
        </table>
    </div>
 
    <div class="margin-top">
        <table class="products">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Discount(Qty)</th>
                <th>Price</th>
                <th>Sub Total</th>
            </tr>
            <tr class="items">
                @foreach($products as $product)
                <td>{{$product->product_code}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->product_quantity}}</td>
                <td>{{$product->product_discount}}</td>
                <td>{{$product->product_price}}</td>
                <td>{{$product->sub_total}}</td>
                @endforeach
            </tr>
        </table>
    </div>
 
    <div class="total">
        Total: $129.00 USD
    </div>
 
    <div class="footer margin-top">
        <div>Thank you</div>
        <div>&copy; Laravel Daily</div>
    </div>
</div>
   
@endsection