@extends('layouts.admin')

@section('page-title')
Bank Expense Update
@endsection

@section('main-content')
{{-- Image plugin css --}}
<link rel="stylesheet" href="{{asset('assets/css/dropify.min.css')}}" />

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Update Bank Expense <small>Update your bank expense from here</small></h2>
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
                    <form action="{{route('bank.expense.update')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Date<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="date" name="date" class="date-picker form-control" value="{{$bank_expense->date}}" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                        <input type="hidden" name="id" id="id" value="{{$bank_expense->id}}">
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="voucher_no">Voucher No<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="voucher_no" name="voucher_no"  value="{{$bank_expense->voucher_no}}" class="form-control" >
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="bank_name">Bank Name

                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <select type="text" name="bank_id" id="bank_id" class="form-control">
                                            @foreach ($banks as $bank)
                                                <option value="{{$bank->id}}" @if($bank_expense->bank_id == $bank->id) selected="" @endif>{{$bank->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="profit_amount">Profit Amount
                                      <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="profit_amount" name="profit_amount" value="{{$bank_expense->profit_amount}}" class="form-control" >
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="profit_month">Profit Month
                                    <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <select type="text" id="profit_month" name="profit_month" value="{{$bank_expense->profit_month}}" class="form-control" >
                                            <option value="">Select Option</option>
                                            @foreach($months as $salary_month)
                                                <option value="{{$salary_month}}" @if($bank_expense->profit_month == $salary_month) selected="" @endif>{{$salary_month}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="other_charge">Other Charge
                                      <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="other_charge" name="other_charge" value="{{$bank_expense->other_charge}}" class="form-control" >
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="payment_by">Paying By<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <select type="text" id="payment_by" name="payment_by" value="{{$bank_expense->payment_by}}" class="form-control" >
                                            <option value="">Select Option</option>
                                            @foreach($payment_types as $payment_type)
                                                <option value="{{$payment_type}}" @if($bank_expense->payment_by == $payment_type ) selected="" @endif>{{$payment_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="payment_amount">Payment Amount<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="payment_amount" name="payment_amount" value="{{$bank_expense->payment_amount}}" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="remarks"> Remarks
                                       <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea type="text" name="remarks" id="remarks" cols="10" rows="2"  class="form-control">{{$bank_expense->remarks}}</textarea>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 text-center">
                                <a href="{{route('bank.expense.index')}}" class="btn btn-primary" type="button">Cancel</a>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
