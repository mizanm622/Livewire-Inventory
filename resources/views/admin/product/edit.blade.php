@extends('layouts.admin')

@section('page-title')
Product Update
@endsection

@section('main-content')
{{-- Image plugin css --}}
<link rel="stylesheet" href="{{asset('assets/css/dropify.min.css')}}" />
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Update Product<small>Update your product from here</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Settings 2</a>
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
                    <form action="{{route('product.update')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="row m-auto">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="code">Product Code <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="code" name="code"  value="{{$product->code}}" class="form-control"> 
                                        <input type="hidden" id="id" name="id"  value="{{$product->id}}">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Product Name <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="name" name="name"  value="{{$product->name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="brand_id">Brand<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                       <select name="brand_id" id="brand_id" class="form-control" >
                                        <option value="">Select Option</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" @if($brand->id == $product->brand_id) selected="" @endif >{{$brand->name}}</option>
                                            @endforeach
                                       </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="group">Group<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="group_id" id="group_id" class="form-control">
                                            @foreach($product_groups as $product_group)
                                                <option value="{{$product_group->id}}" @if($product->group_id == $product_group->id) selected="" @endif>{{$product_group->name}}</option>
                                            @endforeach
                                           </select>
                                    </div>
                                </div>
                              
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="size_id">Size<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                       <select name="size_id" id="size_id"  class="form-control">
                                        <option value="">Select Option</option>
                                            @foreach($sizes as $size)
                                                <option value="{{$size->id}}" @if($size->id == $product->size_id) selected="" @endif >{{$size->name}}</option>
                                             @endforeach
                                       </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="type">Type<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input name="type" id="type" value="{{$product->type}}" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="unit_id">Unit<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                       <select name="unit_id" id="unit_id"  class="form-control">
                                            <option value="">Select Option</option>
                                            @foreach($units as $unit)
                                                <option value="{{$unit->id}}" @if($unit->id == $product->unit_id) selected="" @endif >{{$unit->name}}</option>
                                             @endforeach
                                       </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="metric_ton">Metric Ton<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="metric_ton" name="metric_ton" value="{{$product->metric_ton}}" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="photo">Product Photo <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="file" id="photo" name="photo" class="dropify form-control">
                                        <img src="{{asset($product->photo)}}" alt="Photo" width="30px" height="40px">
                                            <input type="hidden" id="old_photo" name="old_photo" value="{{$product->photo}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="bar_code">Barcode<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="bar_code" name="bar_code"  value="{{$product->bar_code}}"class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="category_id">Category/Subcategory<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                       <select name="category_id" id="category_id" class="form-control">
                                        <option value="">No Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if( $product->category_id == $category->id ) selected="" @endif>{{$category->name}}</option>
                                            @endforeach
                                       </select>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="purches_rate">Purches Rate<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" id="purches_rate" name="purches_rate"  value="{{$product->purches_rate}}"class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="mrp_rate">MRP Rate<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" id="mrp_rate" name="mrp_rate" value="{{$product->mrp_rate}}" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="price_rate">Price Rate<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" id="price_rate" name="price_rate"  value="{{$product->price_rate}}"class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="opening_stock">Opening Stock<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" id="opening_stock" name="opening_stock" value="{{$product->opening_stock}}" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="alert_quantity">Alert Quantity<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" id="alert_quantity" name="alert_quantity"  value="{{$product->alert_quantity}}" class="form-control">
                                    </div>
                                </div>
                               
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="remarks">Remarks<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea type="text" name="remarks" id="remarks" cols="10" rows="2"  class="form-control">{{$product->remarks}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 text-center">
                                <a href="{{route('product.index')}}" class="btn btn-primary" type="button">Cancel</a>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

     {{-- image plugin js--}}
     <script src="{{asset('assets/js/jquery.min.js')}}"></script>
     <script src="{{asset('assets/js/dropify.min.js')}}"></script>
         <script type="text/javascript">
 
         $('.dropify').dropify({
                     messages: {
                         'default': 'Drag and drop',
                         'remove':  'Remove',
                     }
                 });
         </script>
@endsection
