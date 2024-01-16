@extends('layouts.admin')

@section('page-title')
Product Add
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Product to Price Group <small>Add Product to your price group from here</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="#">Settings 1</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('price_group.store.product')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="row m-auto">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Price Group Name <span class=""></span></label>
                                        <input type="text" id="name" name="name" value="{{$price_group->name}}" class="form-control">
                                        <input type="hidden" name="price_group_id" value="{{$price_group->id}}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label  for="description">Description<span class=""></span></label>
                                        <textarea type="text" name="description" id="description" cols="10" rows="1"  class="form-control">{{$price_group->description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="remarks">Remarks<span class=""></span></label>
                                        <textarea type="text" name="remarks" id="remarks" cols="10" rows="1"  class="form-control">{{$price_group->remarks}}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Select Check Box</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Brand</th>
                                            <th>Category</th>
                                            <th>Group</th>
                                            <th>Type</th>
                                            <th>Previous Rate</th>
                                            <th>Present Rate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td><input type="checkbox" name="product_id[]" value="{{$product->id}}" class="form-control btn btn-primary"></td>
                                            <td>{{ $product->code}}</td>
                                            <td>{{ $product->name}}</td>
                                            <td>{{ $product->brand->name}}</td>
                                            <td>{{ $product->category->name ?? " "}}</td>
                                            <td>{{ $product->productGroup->name}}</td>
                                            <td>{{ $product->type}}</td>
                                            <td class="text-right">{{ $product->price_rate}}/=</td>
                                            <td><input type="number" name="price_group_rate[]" class="form-control"></td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>




                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 text-center">
                                <a href="{{route('price_group.index')}}" class="btn btn-primary" type="button">Cancel</a>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
