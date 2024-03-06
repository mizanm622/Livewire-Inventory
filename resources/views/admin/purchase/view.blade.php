@extends('layouts.admin')

@section('page-title')
Purchase View
@endsection

@section('main-content')
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('purchase.index')}}" class="btn btn-md btn-primary">Purchase List</a> </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a href="{{ route('purchase.invoice',$supplier_info->invoice_no) }}" class="btn btn-info btn-link">Download <i class="fa fa-file-pdf-o text-danger"></i></a>
                    </li>
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li>
                        <a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-lg-12 col-md-21 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-21 col-sm-12 offset-2">
                        <div class="col-lg-8 col-md-8-col-sm-12">
                            <div class="banner-area py-3">
                                <img src="{{asset('assets/images/firoz_header.jpg')}}" width="100%" height="120" alt="">
                            </div>
                            <h2 class="text-center text-dark">Challan/Cashmemo.</h2>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 offset-2">
                        <div class="supplier-info-area">
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <h3 class="text-center text-dark">Supplier Info</h3>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Supplier Name</th>
                                            <th>Address</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{date('d-m-Y', strtotime($supplier_info->date))}}</td>
                                            <td>{{$supplier_info->supplier->company_name}}</td>
                                            <td>{{$supplier_info->supplier->address}}</td>

                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Invoice No.</th>
                                            <th>Warehouse</th>
                                            <th>Gari Number - Delivery Men</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>{{$supplier_info->invoice_no}}</td>
                                            <td>{{$supplier_info->warehouse->name}}</td>
                                            <td>{{$supplier_info->transport_no}} : {{$supplier_info->delivery_man}}</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 offset-2">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="product-list-area">
                                <h3 class="text-center text-dark">Products List</h3>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Discount(Qty)</th>
                                            <th>Purchase(Qty)</th>
                                            <th>Price</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $quantity = 0;
                                            $discount = 0;
                                            $purchase_qty = 0;
                                            $total = 0;
                                            $type = 0;
                                        @endphp
                                        @forelse ($products as $product)
                                        @php
                                        $quantity += $product->product_quantity;
                                        $discount += $product->product_discount;
                                        $purchase_qty += $product->product_quantity-$product->product_discount;
                                        $total += $product->sub_total;
                                        $type = $product->product->type;
                                        @endphp
                                        <tr>
                                            <td  class="text-center p-0">{{$product->product_code}}</td>
                                            <td  class="text-center p-0">{{$product->product_name}}</td>
                                            <td class="text-right p-0">{{$product->product_quantity}} {{$product->product->type}}</td>
                                            <td class="text-right p-0">{{$product->product_discount}} {{$product->product->type}}</td>
                                            <td class="text-right p-0">{{$product->product_quantity-$product->product_discount}} {{$product->product->type}} </td>
                                            <td class="text-right p-0">{{$product->product_price}}/=</td>
                                            <td class="text-right p-0">{{$product->sub_total}}/=</td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">
                                                    Not Found!
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                    <tr>
                                        <td class="text-right" colspan="3">Total = {{$quantity}} {{ $type}}</td>
                                        <td class="text-right" colspan="1">Total = {{$discount}} {{ $type}}</td>
                                        <td class="text-right" colspan="1">Total = {{$purchase_qty}}{{ $type}}</td>
                                        <td class="text-right" colspan="2">Total = {{$total}}/=</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12">
                            <div class="calculation-area">
                                <h3 class="text-center text-dark">Billing Info</h3>
                                <table class="table-bordered">
                                    <tr><th>Total Price</th><td>:{{$supplier_info->total_price}}/=</td></tr>
                                    <tr><th>Discount</th><td>:{{$supplier_info->price_discount ?? 0}}/=</td></tr>
                                    <tr><th>Vat</th><td>:{{$supplier_info->vat ?? 0}}/=</td></tr>
                                    <tr><th>Carring</th><td>:{{$supplier_info->carring ?? 0}}/=</td></tr>
                                    <tr><th>Others</th><td>:{{$supplier_info->other_charge ?? 0}}/=</td></tr>
                                    <tr><th>Previous Due</th><td>:{{$supplier_info->old_due ?? 0}}/=</td></tr>
                                    <tr><th>Grand Total</th><td>:{{$supplier_info->old_due+$supplier_info->total_price-($supplier_info->price_discount+$supplier_info->vat+$supplier_info->carring+$supplier_info->other_charge)}}/=</td></tr>
                                    <tr><th>Payment Amount</th><td>:{{$supplier_info->payment ?? 0}}/=</td></tr>
                                    <tr><th>Current Due</th><td>:{{$total = $supplier_info->total_price+$supplier_info->old_due-($supplier_info->price_discount+$supplier_info->vat+$supplier_info->carring+$supplier_info->other_charge+$supplier_info->payment)}}/=</td></tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 offset-2">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="in-word-area py-3">
                                        <h4 class="text-left text-dark">In Words:{{ucwords($numberToWord->format($total))}} Taka Only</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="bottom-area py-3">
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <div class="customer-signature-area">
                                                <h4 class="text-left text-dark">Customer Signature</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <div class="thanks-area">
                                                <h5 class="text-center text-dark">Thanks will come again</h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <div class="supplier-signature-area">
                                                <h4 class="text-right text-dark">Supplier Signature</h4>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
