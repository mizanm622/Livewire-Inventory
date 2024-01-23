@extends('layouts.admin')

@section('page-title')
Purchase View
@endsection

@section('main-content')
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('purchase.index')}}" class="btn btn-md btn-primary">Purchase Invoice</a> <a href="{{route('purchase.invoice')}}" class="btn btn-info">Download Pdf</a>  Purchase Invoice<small>Show Purchase Invoice from here</small></h2>
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
                   
                    <div class="supplier-address-area float-left px-5">
                        <h2 class="x_title">Supplier Address</h2>
                        <p><strong>Name</strong>        :{{$supplier_info->supplier->company_name}}</p>
                        <p><strong>Address</strong>     :{{$supplier_info->supplier->address}}</p>
                        <p><strong>Mobile No.</strong>  :{{$supplier_info->supplier->mobile}}</p>
                        <p><strong>Warehouse:</strong>  :{{$supplier_info->warehouse->name}}</p>
                        <p><strong>Gari No</strong>     :{{$supplier_info->transport_no}}</p>
                        <p><strong>Delivery Men</strong>:{{$supplier_info->delivery_man}}</p>
                        <p><strong>Date</strong>        :{{$supplier_info->date}}</p>
                        
                    </div>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                   
                    <div class="supplier-billing-area float-right px-5">
                        <h2 class="x_title">Billing Info</h2>
                        <p><strong>Invoice No.</strong>     :{{$supplier_info->invoice_no }}</p>
                        <p><strong>Product Discount</strong>:{{$supplier_info->product_discount = $supplier_info->product_discount ?? ''}}</p>
                        <p><strong>Total Quantity</strong>  :{{$supplier_info->total_qty}} Pcs/Bags</p>
                        <p><strong>Total Price.</strong>    :{{$supplier_info->total_price}}/=</p>
                        <p><strong>Discount Price </strong> :{{$supplier_info->price_discount."/=" ?? ''}}</p>
                        <p><strong>Vat</strong>             :{{$supplier_info->vat.'/=' ?? ''}}</p>
                        <p><strong>Carring Charge</strong>  :{{$supplier_info->carring}}/=</p>
                        <p><strong>Other Charge</strong>    :{{$supplier_info->other_charge}}/=</p>
                        <p><strong>Previous Due:</strong>   :{{$supplier_info->old_due}}/=</p>
                        <p><strong>Grand Total</strong>     :{{$supplier_info->old_due+$supplier_info->total_price-($supplier_info->price_discount+$supplier_info->vat+$supplier_info->carring+$supplier_info->other_charge)}}/=</p>
                        <p><strong>Payment Amount</strong>  :{{$supplier_info->payment}}/=</p>
                        <p><strong>Current Due</strong>     :{{$supplier_info->total_price+$supplier_info->old_due-($supplier_info->price_discount+$supplier_info->vat+$supplier_info->carring+$supplier_info->other_charge+$supplier_info->payment)}}/=</p>

                        
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