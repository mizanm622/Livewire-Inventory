@extends('layouts.admin')

@section('page-title')
Warehouse Product List
@endsection

@section('main-content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="back_button mb-2">
                    <a href="{{route('warehouse.index')}}" class="btn btn-md btn-primary float-right">Back</a>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h4 class="text-center  border-bottom">Warehouse Information </h4>
                        <div class="customer_area pt-3">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <h4 class="text-left">Name: {{$warehouse->name}}</h4>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <h4 class="text-left">Address: {{$warehouse->address}}</h4>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <h4 class="text-left">Mobile No.: {{$warehouse->mobile}}</h4>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <h4 class="text-left">Status: {!! $warehouse->status == 1 ? '<button class="btn btn-success btn-sm">Active</button>':'<button class="btn btn-danger btn-sm">Inactive</button>'!!}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="product-galary pt-3">
                            @forelse ($products as $product)
                            <div class="col-lg-2 col-md-2 col-sm-6">
                                <div class="product-area border">
                                    <div class="logo text-center">
                                        @if($product->product->photo)
                                            <img src="{{asset($product->product->photo)}}" alt="Photo" width="80" height="90" class="img-thumbnail">
                                        @else
                                            <p class="text-center">No Product Found!</p>
                                        @endif
                                    </div>
                                    <div class="description">
                                        <table class="">
                                            <tr><th class="p"><strong>Name:</strong>{{$product->product_name }}</th></tr>
                                            <tr><th class="p"><strong>Code:</strong>{{$product->product_code }}</th></tr>
                                            <tr><th class="p"><strong>Quantity:</strong>{{$product->product_quantity}} Bags/Pcs</th></tr>
                                            <tr><th class="p"><strong>Price:</strong>{{$product->product->price_rate}}/=</th></tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
