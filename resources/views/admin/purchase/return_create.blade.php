@extends('layouts.admin')

@section('page-title')
Purchase Return Entry
@endsection

@section('main-content')
{{-- Image plugin css --}}

@php
 
$total = 0;
$quantity =0;
@endphp
 @if(session()->has('return'))
 @foreach (Session::get('return') as $id => $row)
 @php
 $quantity+=$row['quantity'];
 @endphp
 @endforeach
 @endif

<link rel="stylesheet" href="{{asset('assets/css/dropify.min.css')}}" />

    <div class="x_panel">
        <div class="x_title">
            <h2>Purchase Return Entry<small>Add your purchase return entry from here</small></h2>
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
                    <form action="{{route('purchase.return.store')}}" method="post" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="row">
                                    <!--Start supplier area-->
                            
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-12 label-align" for="warehouse_id">Warehouse<span class=""></span>
                                    </label>
                                    <div class="col-md-8 col-sm-12">
                                        <select type="text" id="warehouse_id" name="warehouse_id"  class="form-control">
                                            <option value="">Select Option</option>
                                            @foreach($SupplierInfo as $warehouse)
                                                <option value="{{$warehouse->warehouse_id}}">{{$warehouse->warehouse->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-12 label-align" for="supplier_id">Supplier Name<span class=""></span>
                                    </label>
                                    <div class="col-md-8 col-sm-12">
                                        <select type="text" id="supplier_id" name="supplier_id"  class="form-control">
                                            <option value="">Select Option</option>
                                            @foreach($SupplierInfo as $supplier)
                                                <option value="{{$supplier->supplier_id}}">{{$supplier->supplier->company_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-12 label-align" for="status">Status<span class=""></span>
                                    </label>
                                    <div class="col-md-8 col-sm-12">
                                    <select type="text" name="status" id="status" class="form-control"> 
                                        <option value="Return">Return</option>
                                        <option value="Cancel">Cancel</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="item form-group ">
                                    <label class="col-form-label col-md-4 col-sm-12 label-align" for="date">Date<span class=""></span>
                                    </label>
                                    <div class="col-md-8 col-sm-12">
                                        <input id="date" name="date" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-12 label-align" for="reference_no">Reference No.<span class=""></span>
                                    </label>
                                    <div class="col-md-8 col-sm-12">
                                    <input type="text" name="reference_no" id="reference_no" class="form-control">
                                    </div>
                                </div>
                               
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-12 label-align" for="total_quantity">Total Quantity<span class=""></span>
                                    </label>
                                    <div class="col-md-8 col-sm-12">
                                        <input type="text" name="total_quantity" id="total_quantity" value="{{$quantity}}" readonly class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-12 label-align" for="other_charge">Other Charges<span class=""></span>
                                    </label>
                                    <div class="col-md-8 col-sm-12">
                                        <input type="text" name="other_charge" id="other_charge"  placeholder="vat/tax/etc" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-12 label-align" for="all_discount">Discount on All<span class=""></span>
                                    </label>
                                    <div class="col-md-4 col-sm-12">
                                        <input type="text" name="all_discount" id="all_discount" class="form-control">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <input type="radio" class="flat" name="discount" id="discount" value="0" checked=""/> 
                                        <label for="discount">Percent</label><br>
										<input type="radio" class="flat" name="discount" id="discount" value="1"/>
                                        <label for="discount">Fix</label><br> 
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-12 label-align" for="note">Note<span class=""></span>
                                    </label>
                                    <div class="col-md-8 col-sm-12">
                                        <textarea type="text" name="note" cols="10" rows="2" id="note" class="form-control"></textarea>
                                    </div>
                                </div>
                               
                            </div>
                           <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="x_title">
                                <h5>Payment Info</h5>
                            </div>
                           </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                               
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-12 label-align" for="amount">Amount<span class=""></span>
                                    </label>
                                    <div class="col-md-8 col-sm-12">
                                        <input type="text" name="amount" id="amount"   class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-12 label-align" for="payment_type">Payment Type<span class=""></span>
                                    </label>
                                    <div class="col-md-8 col-sm-12">
                                        <select type="text" name="payment_type" id="payment_type" class="form-control">
                                            <option value="">Select Option</option>
                                            @foreach($payment_types as $payment_type)
                                                <option value="{{$payment_type}}">{{$payment_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-12 label-align" for="account">Account<span class=""></span>
                                    </label>
                                    <div class="col-md-8 col-sm-12">
                                        <select type="text" id="account" name="account"  class="form-control" > 
                                            <option value="">Select Option</option>
                                            <option value="Firoz">Firoz</option>
                                            <option value="Mahady">Mahady</option>
                                            <option value="Razu">Razu</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-12 label-align" for="payment_note">Payment Note<span class=""></span>
                                    </label>
                                    <div class="col-md-8 col-sm-12">
                                    <textarea type="text" name="payment_note" cols="10" rows="2" id="payment_note" class="form-control"></textarea>
                                  
                                    </div>
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
                                       
                                        @if(session()->has('return'))
                                        @foreach (Session::get('return') as $id => $row)
                                        @php
                                            $total+=$row['price_rate']*$row['quantity'];
                                           
                                        @endphp
                                        <tr class="text-center">
                                            
                                            <td>{{$row['code']}}</td>
                                            <td>{{$row['name']}}</td>
                                            <td>{{$row['quantity']}} Pcs</td>
                                            <td>0</td>
                                            <td>{{$row['price_rate']}}/-</td>
                                            <td>{{$row['mrp_rate']}}/-</td>
                                            <td>{{$row['price_rate']*$row['quantity']}}/-</td>
                                            <td><a href="{{route('purchase.return.delete',$row['product_id'])}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash" ></i></a> </td>
                                        </tr>
                                       
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
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="all">Action</th>
                                <th class="all">S.N.</th>
                                <th class="all">Name</th>
                                <th class="all">Quantity</th>
                                <th class="all">Price Rate</th>
                                <th class="all">Photo</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($products as $product)
                                <tr>
                                    <td> 
                                    <form action="{{route('session.return.store')}}" method="post" >
                                        @csrf
                                        <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-plus" ></i> </button></td>
                                        <input type="hidden" name="name" id="name" value="{{$product->product_name}}">
                                        <input type="hidden" name="id" id="id" value="{{$product->product_id}}">
                                        <input type="hidden" name="price_rate" id="price_rate" value="{{$product->product_price}}">
                                        <input type="hidden" name="mrp_rate" id="mrp_rate" value="{{$product->product->mrp_rate}}">
                                        <input type="hidden" name="code" id="code" value="{{$product->product_code}}">
                                        <input type="hidden" name="purchase_code" id="purchase_code" value="{{$product->purchase_code}}">
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        {{$product->product_name}} 
                                        <br><small class="text-info">{{ $product->supplier->company_name}}</small>
                                        <br><small class="text-success">{{ $product->warehouse->name}}</small>
                                    </td>
                                    <td> <input type="number" name="quantity" id="quantity" min="1" max="9999" value="1" class="form-control product_list"></form> </td>
                                    <td>{{$product->product_price}}/-</td>
                                    <td> <img src="{{asset($product->product->photo)}}" alt="" width="30" height="30"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
       
 

    
@endsection