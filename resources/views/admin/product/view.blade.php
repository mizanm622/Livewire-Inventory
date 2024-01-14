@extends('layouts.admin')

@section('page-title')
Product List
@endsection

@section('main-content')
<div class="container">
    <div class="product-area">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <h4 class="text-center">{{$product->name}} </h4>
                        
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="back_button mb-2">
                            <a href="{{route('product.index')}}" class="btn btn-md btn-primary float-right">Back</a>
                        </div>
                        
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="logo text-center my-3">
                            @if(empty($product->photo))
                            <h4>No Image Found!</h4>
                            @else
                            <img src="{{asset($product->photo)}}" class="img-thumbnail img-responsive" alt="Logo" width="250" height="320">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <table class="table table-striped">
                            <thead>
                                <tr><th>Code</th><td>:{{$product->code}}</td></tr>
                                <tr><th>Name</th><td>:{{$product->name}}</td></tr>
                                @if(empty($product->brand_id))
                                @else
                                    <tr><th>Brand</th><td>:{{$product->brand->name}}</td></tr>
                                @endif
                                @if(empty($product->category_id))
                                @else
                                    <tr><th>Category</th><td>:{{$product->category->name}}</td></tr>
                                @endif
                                @if(empty($product->group_id))
                                @else
                                <tr><th>Product Group</th><td>:{{$product->productGroup->name}}</td></tr>
                                @endif
                                <tr><th>Type</th><td>:{{$product->type}}</td></tr>
                                @if(empty($product->size_id))
                                @else
                                    <tr><th>Size</th><td>:{{$product->size->name}}</td></tr>
                                @endif
                                <tr><th>Weight</th><td>:{{$product->weight}}</td></tr>
                                @if(empty($product->unit_id))
                                @else
                                    <tr><th>Unit</th><td>:{{$product->unit->name}}</td></tr>
                                @endif
                                @if($product->opening_stock <= $product->alert_quantity)
                                <tr><th>Available Stack</th><td>:<span class="badge badge-warning">{{$product->opening_stock}}</span></td></tr>
                                @else
                                <tr><th>Available Stack</th><td>:<span class="badge badge-success">{{$product->opening_stock}}</span></td></tr>
                                @endif
                            </thead>
                        </table>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">

                        <table class="table table-striped">
                            <thead>
                                <tr><th>Metric Ton</th> <td>:{{$product->metric_ton}}</td>
                                <tr><th>Purchesing Price</th><td>:{{$product->purches_rate}}/-</td></tr>
                                <tr><th>Selling Price</th>  <td>:{{$product->price_rate}}/-</td></tr>
                                <tr><th>MRP:</th><td>:{{$product->mrp_rate}}/-</td></tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 sol-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Remarks</a>
                                    </li>
                                    
                                   
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        {{$product->remarks}}
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