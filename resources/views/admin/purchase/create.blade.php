@extends('layouts.admin')

@section('page-title')
Purchase Entry
@endsection

@section('main-content')
{{-- Image plugin css --}}
<link rel="stylesheet" href="{{asset('assets/css/dropify.min.css')}}" />

    <div class="x_panel">
        <div class="x_title">
            <h2>Purchase Entry<small>Add your purchase entry from here</small></h2>
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
            <div class="row">
                <div class="col-lg-6 col-md-7 col-sm-12">
                    <form action="{{route('purchase.store')}}" method="post" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="row">
                           
                                    <!--Start supplier area-->
                            <div class="col-lg-4 col-md-6 col-sm-12">

                                <div class="form-group">
                                    <label for="supplier_id">Supplier Name:</label>
                                        <select type="text" id="supplier_id" name="supplier_id"  class="form-control">
                                            <option value="">Select Option</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->company_name}}</option>
                                            @endforeach
                                        </select>
                                </div>

                                <div class="form-group ">
                                    <label class="" for="date">Date:</label>
                                        <input id="date" name="date" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                </div>

                                <div class="form-group">
                                    <label  for="prepare">Gari Number:</label>
                                    <input type="text" name="prepare" id="prepare" class="form-control">
                                </div>
                               
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">

                                <div class="form-group">
                                    <label for="transport_no">Address:</label>
                                    <textarea type="text" name="address" id="address" class="form-control" cols="5" rows="1"></textarea>
                                </div> 
                                <div class="form-group">
                                    <label class="" for="warehouse_id">Warehouse:</label>
                                        <select type="text" id="warehouse_id" name="warehouse_id"  class="form-control">
                                            <option value="">Select Option</option>
                                            @foreach($warehouses as $warehouse)
                                                <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                                            @endforeach
                                        </select>
                                    
                                </div>
                               

                                <div class="form-group">
                                    <label for="delivery_man">Delivery Man:</label>
                                    <input type="text" name="delivery_man" id="delivery_man" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="transport_no">Phone:</label>
                                    <input type="text" name="phone" id="phone" class="form-control">
                                </div> 
                                <div class="form-group">
                                    <label  for="invoice_no">Invoice No:</label>
                                    <input type="text" name="invoice_no" id="invoice_no" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="old_due">Old Due:</label>
                                    <input type="number" name="old_due" id="old_due" class="form-control">
                                </div>
                            </div>
                            <!--End supplier area-->
                            <div class="ln_solid"></div>
                            <div class="col-lg-12 col-md-12 col-sm-12 offset-md-4">
                                <div class="item form-group">
                                    <a href="{{route('purchase.index')}}" class="btn btn-primary" type="button">Cancel</a>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                            <!--Start Product area-->
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="search" name="search_key" id="search_key" placeholder="search product" class="form-control">
                                        </div>
                                    </div>

                                </form>
                                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="all">Code</th>
                                            <th class="all">Name</th>
                                            <th class="all">Quantity</th>
                                            <th class="all">Discount</th>
                                            <th class="all">Salse Rate</th>
                                            <th class="all">MRP Rate</th>
                                            <th class="all">Sub Total</th>
                                            <th class="all">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total = 0;
                                        @endphp
                                        @if(session()->has('cart'))
                                        @foreach (Session::get('cart') as $id => $row)
                                        @php
                                            $total+=$row['price_rate']*$row['quantity'];
                                        @endphp
                                        <tr class="text-center">
                                            <td>{{$row['code']}}</td>
                                            <td>{{$row['name']}}</td>
                                            <td><input type="number" name="quantity[]" id="quantity" min="1" max="9999" value="{{$row['quantity']}}" class="form-control product_list"></td>
                                            <td><input type="number" name="discount[]" id="discount" min="1" max="9999" value="0" class="form-control product_list"></td>
                                            <td>{{$row['price_rate']}}/-</td>
                                            <td>{{$row['mrp_rate']}}/-</td>
                                            <td>{{$row['price_rate']*$row['quantity']}}/-</td>
                                            <td><a href="{{route('purchase.delete',$row['product_id'])}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash" ></i></a> </td>
                                        </tr>
                                        <input type="hidden" name="code[]" id="code[]" value="{{$row['code']}}">
                                        <input type="hidden" name="name[]" id="name[]" value="{{$row['name']}}">
                                        <input type="hidden" name="product_id[]" id="product_id[]" value="{{$row['product_id']}}">
                                        <input type="hidden" name="price_rate[]" id="price_rate[]" value="{{$row['price_rate']}}">
                                        <input type="hidden" name="sub_total[]" id="sub_total[]" value="{{$row['price_rate']*$row['quantity']}}">
                                        @endforeach
                                        @endif
                                        <tr class="text-right">
                                            <td colspan="7"><strong>Total =</strong> {{$total}}/-</td>
                                            <input type="hidden" name="total" id="total" value="{{$total}}">
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!--End Product area-->
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-12">
                    <div class="">
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <div class="col-md-4 col-sm-3">
                                            <div class="input-group">
                                               <select name="brand_id" id="brand_id" type="text" class="form-control">
                                                    <option value="">Brand Name</option>
                                               </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-3 form-group pull-right top_search">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search for...">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button">Go!</button>
                                                </span>
                                            </div>
                                        </div>
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
                                                <div class="col-lg-4 col-md-55 col-sm-12">
                                                    <div class="thumbnail">
                                                        <div class="image view view-first">
                                                           
                                                            @if(empty($product->photo))
                                                            <h5 my-auto>Opps No Image Found!</h5>
                                                            @else
                                                            <img style="width: 100%; display: block;" src="{{asset($product->photo)}}" alt="image" />
                                                            @endif
                                                            <form action="{{route('session.store')}}" method="post" >
                                                                @csrf
                                                            <div class="mask">
                                                                {{-- <p class="float-left"><span class="badge badge-info">Qty:{{$product->opening_stack}}</span></p> --}}
                                                                @if(empty($product->brand_id))
                                                                @else
                                                                    <p>{{$product->brand->name}}</p>
                                                                @endif
                                                                <div class="tools tools-bottom">
                                                                    <button type="submit" class="btn btn-info btn-sm text-center "><i class="fa fa-plus" ></i> Add</button>
                                                                    {{-- <a href="#"><i class="fa fa-link"></i></a>
                                                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                                                    <a href="#"><i class="fa fa-times"></i></a> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="caption">
                                                            
                                                         
                                                                <input type="hidden" name="name" id="name" value="{{$product->name}}">
                                                                <input type="hidden" name="id" id="id" value="{{$product->id}}">
                                                                <input type="hidden" name="price_rate" id="price_rate" value="{{$product->price_rate}}">
                                                                <input type="hidden" name="mrp_rate" id="mrp_rate" value="{{$product->mrp_rate}}">
                                                                <input type="hidden" name="code" id="code" value="{{$product->code}}">
                                                                <input type="hidden" name="quantity" id="quantity" value="1">
                                                                <input type="hidden" name="discount" id="discount" value="0">
                                                            
                                                            <p class="text-wrap">{{$product->name}} <span class="float-right"> </span></p>
                                                            <p><span class="badge badge-info">Qty:{{$product->opening_stack}} </span> <span class="float-right"><strong >৳.</strong> {{$product->price_rate}}/=</span>
                                                            </p>
                                                           
                                                        </div>
                                                    </form> 
                                                    </div>
                                                </div>
                                            @endforeach
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
