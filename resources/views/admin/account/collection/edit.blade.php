@extends('layouts.admin')

@section('page-title')
Collection Update
@endsection

@section('main-content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Update Collection <small>Update your collection from here</small></h2>
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
                <form action="{{route('collection.update')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        {{-- <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="customer-search-area d-flex justify-content-center">
                                    <div class="form-group" wire:ignore>
                                        <select type="search"  name="customer_search" id="collection-customer-search"   placeholder="search" class="form-control">
                                            <option value=""></option>
                                            @foreach ($customers as $customer)
                                                <option value="{{$customer->id}}">
                                                    {{$customer->name}} |
                                                    {{$customer->address}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="collection-form-area d-flex justify-content-center">
                                <div class="col-lg-2 col-md-2 col-sm-12">
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
        
                                    <div class="form-group">
                                        <label for="supplier_name">Voucher No:</label>
                                        <input type="text"  name="invoice_no"  value="{{$customer->invoice_no}}" class="form-control">
                                        <input type="hidden"  name="customer_id"  value="{{$customer->customer_id}}">
                                        <input type="hidden"  name="id"  value="{{$customer->id}}">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="form-group">
                                        <label for="supplier_name">Customer Name:</label>
                                        <input type="text"  name="customer_name"  value="{{$customer->customer->name}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label  for="prepare">Paying By:</label>
                                        <select type="text" name="payment_by"  class="form-control">  
                                            <option value="">Select Option</option>
                                                @foreach($payment_types as $payment_type)
                                                    <option value="{{$payment_type}}" @if($customer->payment_by == $payment_type ) selected="" @endif>{{$payment_type}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label  for="prepare">Bank Name:</label>
                                        <select type="text" name="bank_title"  class="form-control">  
                                                <option value="">Select Option</option>
                                                    @foreach($banks as $bank)
                                                        <option value="{{$bank->title}}" @if($customer->bank_title == $bank->title ) selected="" @endif>{{$bank->title}}</option>
                                                    @endforeach
                                        </select>
                                    </div>
                                    @if($customer->payment_by === 'Cheque')
                                        <div class="form-group">
                                            <label  for="prepare">Cheque No.:</label>
                                                <input type="number" name="cheque" value="{{$customer->bank_title}}" class="form-control">
                                        </div>
                                    @else
                                    <div class="form-group">
                                        <label  for="prepare">Cheque No.:</label>
                                            <input type="number"  name="cheque" class="form-control">

                                    </div>
                                    @endif
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="form-group">
                                        <label for="supplier_name">Address:</label>
                                        <input type="text"  name="address" value="{{$customer->customer->address}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label  for="prepare">Purpose:</label>
                                        <textarea type="text" name="purpose"  cols="5" rows="2" class="form-control">{{$customer->purpose}}</textarea>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="form-group">
                                        <label for="supplier_name">Mobile:</label>
                                        <input type="text"  name="mobile"  value="{{$customer->customer->mobile}}" class="form-control">
                                    </div>
        
                                    <div class="form-group">
                                        <label  for="prepare">Remarks:</label>
                                        <textarea type="text" name="remarks" id="transport_no" class="form-control" cols="5" rows="2">{{$customer->remarks}}</textarea>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    @if(isset($supplier->previous_advance))
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
                                        <label  for="prepare">Amount:</label>
                                        <input type="text" name="payment" value="{{$customer->paid_amount}}" id="payment" class="form-control">
                                    </div>

                                    @if(isset($customer->current_advance))
                                        <div class="form-group">
                                            <label  for="prepare">Due Amount:</label>
                                            <input type="text" name="current_advance"  value="{{-$customer->current_advance}}" id="current_due" class="form-control">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label  for="prepare">Due Amount:</label>
                                            <input type="text" name="current_due"  value="{{$customer->current_due}}" id="current_due" class="form-control">
                                        </div>
                                    @endif
                                  
                                    
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 text-center">
                                <a href="{{route('collection.index')}}" class="btn btn-primary" type="button">Cancel</a>
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
