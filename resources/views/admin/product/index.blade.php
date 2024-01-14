@extends('layouts.admin')

@section('page-title')
Product List
@endsection

@section('main-content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('product.create')}}" class="btn btn-md btn-primary">+Add Product</a> Product List<small>Show product list from here</small></h2>
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
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="card-box table-responsive">
                        {{-- notification message --}}
                        @if(session()->has('msg'))
                            <div class="text-center alert alert-success">
                                {{session()->get('msg')}}
                            </div>
                        @endif
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                <th class="all">S.N.</th>
                                <th class="all">Code</th>
                                <th class="all">Name</th>
                                <th class="all">Brand</th>
                                <th class="all">Category</th>
                                <th class="all">Group</th>
                                <th class="all">Size</th>
                                <th class="all">Type</th>
                                <th class="all">Unit</th>
                                <th class="all">Stock</th>
                                <th class="all">M/T</th>
                                <th class="all">Purches Rate</th>
                                <th class="all">MRP Rate</th>
                                <th class="all">Price Rate</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$product->code}}</td>
                                        <td>{{$product->name}}</td>
                                        @if(empty($product->brand_id))
                                            <td></td>
                                        @else
                                            <td>{{$product->brand->name}}</td>
                                        @endif
                                        @if(empty($product->category_id))
                                            <td></td>
                                        @else
                                            <td>{{$product->category->name}}</td>
                                        @endif
                                        @if(empty($product->group_id))
                                            <td></td>
                                        @else
                                            <td>{{$product->productGroup->name}}</td>
                                        @endif
                                        @if(empty($product->size_id))
                                            <td></td>
                                        @else
                                            <td>{{$product->size->name}} Kg</td>
                                        @endif
                                            <td>{{$product->type}}</td>
                                        @if(empty($product->unit_id))
                                            <td></td>
                                        @else
                                            <td>{{$product->unit->name}} Bags</td>
                                        @endif

                                            <td>{{$product->opening_stock }} Bags</td>
                                        @if(empty($product->size_id))
                                            <td></td>
                                        @else
                                            <td>{{$product->size->name*$product->opening_stock/1000}} {{$product->metric_ton}}</td>
                                        @endif
                                        @if(empty($product->purches_rate))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$product->purches_rate}}/-</td>
                                        @endif 
                                        @if(empty($product->mrp_rate))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$product->mrp_rate}}/-</td>
                                        @endif
                                        @if(empty($product->price_rate))
                                        <td></td>
                                        @else
                                            <td class="text-right">{{$product->price_rate}}/-</td>
                                        @endif 
                                        <td> <a href="{{route('product.edit',$product->id)}}" class="btn btn-success"><i class="fa fa-edit" ></i></a> <a href="{{route('product.delete',$product->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a> <a href="{{route('product.view',$product->id)}}" class="btn btn-info"><i class="fa fa-eye" ></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Single product view by modal --}}
 <!-- Large modal -->
 {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".product-view">Large modal</button> --}}

 <div class="modal fade product-view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Product Info</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Text in a modal</h4>
                    </div>
                    <div class="card-body">
                    

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div> 
     </div>
</div>
@endsection
