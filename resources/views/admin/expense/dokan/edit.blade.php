@extends('layouts.admin')

@section('page-title')
Dokan Expense Update
@endsection

@section('main-content')
{{-- Image plugin css --}}
<link rel="stylesheet" href="{{asset('assets/css/dropify.min.css')}}" />

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Update Dokan Expense <small>Update your dokan expense from here</small></h2>
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
                    <form action="{{route('dokan.expense.update')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Date<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="date" name="date" class="date-picker form-control" value="{{$dokan_expense->date}}" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                        <input type="hidden" name="id" id="id" value="{{$dokan_expense->id}}">
                                    </div>
                                </div>

                             
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="voucher_no">Voucher No<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="voucher_no" name="voucher_no"  value="{{$dokan_expense->voucher_no}}" class="form-control" >
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="dokan_rent">Dokan Rent	
                                        <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="dokan_rent" name="dokan_rent" value="{{$dokan_expense->dokan_rent}}" class="form-control" >
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="rent_amount">Rent Amount	
                                      <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="rent_amount" name="rent_amount" value="{{$dokan_expense->rent_amount}}" class="form-control" >
                                    </div>
                                </div>
                            
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="rent_month">Rent Month
                                    <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <select type="text" id="rent_month" name="rent_month" value="{{$dokan_expense->rent_month}}" class="form-control" >
                                            <option value="">Select Option</option>
                                            @foreach($months as $salary_month)
                                                <option value="{{$salary_month}}" @if($dokan_expense->profit_month == $salary_month) selected="" @endif>{{$salary_month}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="receiving_by">Receiving By<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <select type="text" id="receiving_by" name="receiving_by" class="form-control" >
                                            <option value="">Select Option</option>
                                            @foreach($payment_types as $payment_type)
                                                <option value="{{$payment_type}}" @if($dokan_expense->receiving_by == $payment_type ) selected="" @endif>{{$payment_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="payment_by">Paying By<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <select type="text" id="payment_by" name="payment_by" class="form-control" >
                                            <option value="">Select Option</option>
                                            @foreach($payment_types as $payment_type)
                                                <option value="{{$payment_type}}" @if($dokan_expense->payment_by == $payment_type ) selected="" @endif>{{$payment_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="payment_amount">Payment Amount<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="payment_amount" name="payment_amount" value="{{$dokan_expense->payment_amount}}" class="form-control">
                                    </div>
                                </div>
        
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="remarks"> Remarks	
                                       <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea type="text" name="remarks" id="remarks" cols="10" rows="2"  class="form-control">{{$dokan_expense->remarks}}</textarea>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 text-center">
                                <a href="{{route('dokan.expense.index')}}" class="btn btn-primary" type="button">Cancel</a>
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
