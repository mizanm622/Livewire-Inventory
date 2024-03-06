@extends('layouts.admin')

@section('page-title')
Supplier Due Update
@endsection

@section('main-content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Update Supplier Due <small>Update your supplier due from here</small></h2>
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
                <form action="{{route('supplier.due.update')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="col-lg-12 col-md-12 col-sm-12 offset-1">

                        <div class="row">
                            <div class="collection-form-area">
                                <div class="col-lg-3 col-md-3 col-sm-12">

                                    <div class="form-group">
                                        <label for="customer_name">Supplier Name:</label>
                                        <input type="text"  name="company_name"   value="{{$supplier->supplier->company_name}}" class="form-control">
                                        <input type="hidden"  name="supplier_id"   value="{{$supplier->supplier_id}}">
                                        <input type="hidden"  name="id"   value="{{$supplier->id}}">
                                    </div>

                                    <div class="form-group ">
                                        <label class="" for="date">Date:</label>
                                            <input id="date" name="date" value="{{$supplier->date}}" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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
                                        <input type="text"  name="address"  value="{{$supplier->supplier->address}}" class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <label for="purpose">Purpose</label>
                                        <input type="text"  name="purpose"  value="{{$supplier->purpose}}" class="form-control">
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="mobile">Mobile:</label>
                                        <input type="text"  name="mobile"  value="{{$supplier->supplier->mobile}}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label  for="remarks">Remarks:</label>
                                        <textarea type="text" name="remarks"  id="transport_no" class="form-control" cols="5" rows="2">{{$supplier->remarks}}</textarea>
                                    </div>

                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    @if(isset($supplier->previous_advance))
                                        <div class="form-group">
                                            <label for="supplier_name">Total Due:</label>
                                            <input type="text"  name="previous_advance"  value="{{-$supplier->previous_advance}}" class="form-control">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="supplier_name">Total Due:</label>
                                            <input type="text"  name="previous_due"  value="{{$supplier->previous_due}}" class="form-control">
                                        </div>
                                    @endif


                                    <div class="form-group">
                                        <label  for="payment">Amount:</label>
                                        <input type="text" name="payment" value="{{$supplier->paid_amount}}" id="payment" class="form-control">
                                    </div>
                                    @if(isset($supplier->current_advance))
                                    <div class="form-group">
                                        <label  for="prepare">Due Amount:</label>
                                        <input type="text" name="current_advance"  value="{{-$supplier->current_advance}}" id="current_due" class="form-control">
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label  for="prepare">Due Amount:</label>
                                        <input type="text" name="current_due"  value="{{$supplier->current_due}}" id="current_due" class="form-control">
                                    </div>
                                @endif

                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 offset-3">
                                <a href="{{route('supplier.due.index')}}" class="btn btn-primary" type="button">Cancel</a>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
