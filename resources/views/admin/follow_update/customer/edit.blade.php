@extends('layouts.admin')

@section('page-title')
Customer Follow Update Update
@endsection

@section('main-content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Update Customer Follow Update <small>Update your customer Follow Update from here</small></h2>
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
                <form action="{{route('customer.follow.update')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="col-lg-12 col-md-12 col-sm-12 offset-1">
                       
                        <div class="row">
                            <div class="collection-form-area">
                                <div class="col-lg-3 col-md-3 col-sm-12">

                                    <div class="form-group">
                                        <label for="customer_name">Customer Name:</label>
                                        <input type="text"  name="customer_id"   value="{{$customer->customer_id}}" class="form-control">
                                        <input type="hidden"  name="id"   value="{{$customer->id}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Mobile:</label>
                                        <input type="text"  name="mobile"  value="{{$customer->customer->mobile}}" class="form-control">
                                    </div>

                                    
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="customer_name">Customer Name:</label>
                                        <input type="text"  name="customer_name"   value="{{$customer->customer->name}}" class="form-control">
                                      
                                    </div>

                                    <div class="form-group ">
                                        <label class="" for="date">Date:</label>
                                            <input id="date" name="date" value="{{$customer->date}}" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                            <script>
                                                function timeFunctionLong(input) {
                                                    setTimeout(function() {
                                                        input.type = 'text';
                                                    }, 60000);
                                                }
                                            </script>
                                    </div>
                                  
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input type="text"  name="address"  value="{{$customer->customer->address}}" class="form-control">
                                    </div>

                                    

                                    <div class="form-group">
                                        <label  for="remarks">Remarks:</label>
                                        <textarea type="text" name="remarks"  id="transport_no" class="form-control" cols="5" rows="2">{{$customer->remarks}}</textarea>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label  for="prepare">Paying By:</label>
                                        @if(isset($bank_title))
                                    
                                        @else
                                            <select type="text" value="payment_by" wire:change="paymentSearch($event.target.value)"  name="payment_by"  class="form-control">  
                                                <option value="">Select Option</option>
                                                    @foreach($payment_types as $payment_type)
                                                        <option value="{{$payment_type}}">{{$payment_type}}</option>
                                                    @endforeach
                                            </select>
                                        
                                        @endif
                                        @if(isset($bank_list))
                                            @if($bank_list == 1)
                                                <select type="text" value="bank_title" wire:change="paymentSearch($event.target.value)"  name="payment_by"  class="form-control">  
                                                    <option value="">Select Option</option>
                                                        @foreach($banks as $bank)
                                                            <option value="{{$bank->title}}">{{$bank->title}}</option>
                                                        @endforeach
                                                </select>
                                            @elseif($bank_list == 2)
                                                <input type="text" value="bank_title" class="form-control">

                                            @else
                                                

                                            @endif
                                        @endif
                                    </div> --}}
                                </div>
                               
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    @if(isset($customer->previous_advance))
                                        <div class="form-group">
                                            <label for="supplier_name">Total Due:</label>
                                            <input type="text"  name="previous_advance"  value="{{-$customer->previous_advance}}" class="form-control">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="supplier_name">Total Due:</label>
                                            <input type="text"  name="previous_due"  value="{{$customer->previous_due}}" class="form-control">
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label  for="payment">Amount:</label>
                                        <input type="text" name="payment" value="{{$customer->paid_amount}}" id="payment" class="form-control">
                                    </div>

                                    {{-- @if(isset($customer->current_advance))
                                        <div class="form-group">
                                            <label  for="prepare">Due Amount:</label>
                                            <input type="text" name="current_advance"  value="{{-$customer->current_advance}}" id="current_due" class="form-control">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label  for="prepare">Due Amount:</label>
                                            <input type="text" name="current_due"  value="{{$customer->current_due}}" id="current_due" class="form-control">
                                        </div>
                                    @endif --}}
                                    
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 offset-3">
                                <a href="{{route('customer.follow.index')}}" class="btn btn-primary" type="button">Cancel</a>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    
@endsection
