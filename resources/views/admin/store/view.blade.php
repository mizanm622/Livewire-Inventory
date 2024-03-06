@extends('layouts.admin')

@section('page-title')
Store Product List
@endsection

@section('main-content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="back_button mb-2">
                    <a href="{{route('store.index')}}" class="btn btn-md btn-primary float-right">Back</a>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h4 class="text-center  border-bottom">Store Information</h4>
                        <div class="customer_area py-5 border">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <h6 class="text-center">Name: {{$store->name}}</h6>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <h6 class="text-left">Address: {{$store->address}}</h6>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <h6 class="text-center">Mobile No.: {{$store->mobile}}</h6>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <h6 class="text-center">Status: {!! $store->status == 1 ? '<span class="fa fa-check-circle text-success"> Active</span>':'<span class="fa fa-times-circle text-danger">Inactive</span>'!!}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="product-area mt-3">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Brand</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Purchase Rate</th>
                                        <th>Price Rate</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total_quantity = 0;
                                    @endphp
                                    @foreach ($products as $product)
                                    @php
                                        $total_quantity+= $product->product_quantity;
                                    @endphp
                                    <tr>
                                        <td>{{ $product->product->code}}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product->brand->name ?? "" }}</td>
                                        <td>{{ $product->product->category->name ?? "" }}</td>
                                        <td>{{ $product->product->type ?? "" }}</td>
                                        <td class="text-right">{{ $product->purchase_price }}/=</td>
                                        <td class="text-right">{{ $product->product->price_rate}}/=</td>
                                        <td>{{ $product->product_quantity}} Pcs/Bags</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tr>
                                    <td colspan="8" class="text-right">Total Quantity = {{  $total_quantity }} Pcs/Bags</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
