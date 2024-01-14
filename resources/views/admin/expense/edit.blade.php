@extends('layouts.admin')

@section('page-title')
Expense Update
@endsection

@section('main-content')
{{-- Image plugin css --}}
<link rel="stylesheet" href="{{asset('assets/css/dropify.min.css')}}" />

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Update Expense <small>Update your expense from here</small></h2>
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
                    <form action="{{route('expense.update')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Date<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="date" name="date" class="date-picker form-control" placeholder="dd-mm-yyyy" value="{{$expense->date}}" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                        <input type="hidden" name="id" id="id" value="{{$expense->id}}">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="category">Category<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <select type="text" id="category_id" name="category_id"  class="form-control" >
                                            <option value="">Select Option</option>
                                            @foreach($expense_categories as $expense_category)
                                                <option value="{{$expense_category->id}}" @if($expense->category_id == $expense_category->id) selected="" @endif>{{$expense_category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="expense_for">Expense For<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="expense_for" name="expense_for" value="{{$expense->expense_for}}" class="form-control" >
                                    </div>
                                </div>
                                

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="payment_type">Payment Type<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <select type="text" id="payment_type" name="payment_type"  class="form-control" >
                                            <option value="">Select Option</option>
                                            @foreach($payment_types as $payment_type)
                                                <option value="{{$payment_type}}" @if($expense->payment_type == $payment_type) selected="" @endif>{{$payment_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="account">Account<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <select type="text" id="account" name="account"  class="form-control" > 
                                            <option value="Firoz">Firoz</option>
                                            <option value="Mahady">Mahady</option>
                                            <option value="Razu">Razu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="amount">Amount<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="amount" name="amount" value="{{$expense->amount}}" class="form-control" >
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="reference_no">Reference No.<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="reference_no" name="reference_no" value="{{$expense->reference_no}}" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="created_by">Created By<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="created_by" name="created_by" value="{{$expense->created_by}}" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="note">Note<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea type="text" name="note" id="note" cols="10" rows="2"  class="form-control">{{$expense->note}}</textarea>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                      
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 text-center">
                                <a href="{{route('expense.index')}}" class="btn btn-primary" type="button">Cancel</a>
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
