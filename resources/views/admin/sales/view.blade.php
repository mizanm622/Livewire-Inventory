@extends('layouts.admin')

@section('page-title')
Sales View
@endsection

@section('main-content')
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('sales.index')}}" class="btn btn-md btn-primary">Sales Invoice</a> Sales Invoice<small>Show Sales Invoice from here</small></h2>
                <ul class="nav navbar-right panel_toolbox">
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
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                   
                    <div class="customer-address-area float-left px-5">
                        <h2 class="x_title">Customer Address</h2>
                        <p><strong>Name</strong>        :{{$customer_info->customer->name}}</p>
                        <p><strong>Company Name</strong>:{{$customer_info->customer->company_name}}</p>
                        <p><strong>Address</strong>     :{{$customer_info->customer->address}}</p>
                        <p><strong>Mobile No.</strong>  :{{$customer_info->customer->mobile}}</p>
                        <p><strong>Warehouse:</strong>  :{{$customer_info->warehouse->name}}</p>
                        <p><strong>Gari No</strong>     :{{$customer_info->transport_no}}</p>
                        <p><strong>Delivery Men</strong>:{{$customer_info->delivery_man}}</p>
                        <p><strong>Date</strong>        :{{$customer_info->date}}</p>
                        
                    </div>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                   
                    <div class="customer-billing-area float-right px-5">
                        <h2 class="x_title">Billing Info</h2>
                        <p><strong>Invoice No.</strong>     :{{$customer_info->invoice_no }}</p>
                        <p><strong>Product Discount</strong>:{{$customer_info->product_discount = $customer_info->product_discount ?? ''}}</p>
                        <p><strong>Total Quantity</strong>  :{{$customer_info->total_qty}} Pcs/Bags</p>
                        <p><strong>Total Price.</strong>    :{{$customer_info->total_price}}/=</p>
                        <p><strong>Discount Price </strong> :{{$customer_info->price_discount."/=" ?? ''}}</p>
                        <p><strong>Vat</strong>             :{{$customer_info->vat.'/=' ?? ''}}</p>
                        <p><strong>Carring Charge</strong>  :{{$customer_info->carring}}/=</p>
                        <p><strong>Other Charge</strong>    :{{$customer_info->other_charge}}/=</p>
                        <p><strong>Previous Due:</strong>   :{{$customer_info->old_due}}/=</p>
                        <p><strong>Grand Total</strong>     :{{$customer_info->old_due+$customer_info->total_price-$customer_info->price_discount+($customer_info->vat+$customer_info->carring+$customer_info->other_charge)}}/=</p>
                        <p><strong>Payment Amount</strong>  :{{$customer_info->payment}}</p>
                        <p><strong>Current Due</strong>     :{{$customer_info->total_price+$customer_info->old_due-$customer_info->price_discount+($customer_info->vat+$customer_info->carring+$customer_info->other_charge)-$customer_info->payment}}/=</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2 class="x_title">Products List</h2>
                    <div class="product-list-area">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Discount(Qty)</th>
                                    <th>Price</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                <tr>
                                    <td>{{$product->product_code}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_quantity}}</td>
                                    <td>{{$product->product_discount}}</td>
                                    <td>{{$product->product_price}}</td>
                                    <td>{{$product->sub_total}}</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            Not Found!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection