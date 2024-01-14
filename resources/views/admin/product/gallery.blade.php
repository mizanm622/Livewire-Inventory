@extends('layouts.admin')

@section('page-title')
Product Gallery
@endsection

@section('main-content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3> Product Gallery <small> Show all product from here</small> </h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                </span>
            </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Product Gallery <small>Product gallery view</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-2 col-md-55 col-sm-12">
                                <div class="thumbnail">
                                    <a href="{{route('product.view',$product->id)}}" target="_blank">
                                        <div class="image view view-first">
                                            @if(empty($product->photo))
                                            <h5 my-auto>Opps No Image Found!</h5>
                                            @else
                                            <img style="width: 100%; display: block;" src="{{asset($product->photo)}}" alt="image" />
                                            @endif
                                            <div class="mask">
                                                @if(empty($product->brand_id))
                                                @else
                                                    <p>{{$product->brand->name}}</p>
                                                @endif
                                                <div class="tools tools-bottom">
                                                    {{-- <a href="#"><i class="fa fa-link"></i></a>
                                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                                    <a href="#"><i class="fa fa-times"></i></a> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="caption">
                                            <p>{{$product->name}}</p>
                                            @if(empty($product->category_id))
                                            @else
                                                <p>{{$product->category->name}}</p>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection