@extends('layouts.admin')

@section('page-title')
Supplier Follow Update Update
@endsection

@section('main-content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Update Supplier Following Date</h2>
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
                <form action="{{route('supplier.follow.update')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="col-lg-12 col-md-12 col-sm-12 offset-1">

                        <div class="row">
                            <div class="collection-form-area">
                                <div class="col-lg-3 col-md-3 col-sm-12">

                                    <div class="form-group">
                                        <label class="py-1 d-block border" for="supplier_name">Supplier Id:</label>
                                        <input type="text"  name="supplier_id" readonly  value="{{$supplier->supplier_id}}" class="form-control">
                                        <input type="hidden"  name="id"   value="{{$supplier->id}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="py-1 d-block border" for="mobile">Mobile:</label>
                                        <input type="text"  name="mobile"  value="{{$supplier->supplier->mobile}}" class="form-control">
                                    </div>


                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="py-1 d-block border" for="company_name">Supplier Name:</label>
                                        <input type="text"  name="company_name"   value="{{$supplier->supplier->company_name}}" class="form-control">

                                    </div>

                                    <div class="form-group ">
                                        <label class="py-1 d-block border" for="date">Date:</label>
                                            <input id="date" name="next_date"   value="{{$supplier->next_date}}" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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
                                        <label class="py-1 d-block border" for="address">Address:</label>
                                        <input type="text"  name="address"  value="{{$supplier->supplier->address}}" class="form-control">
                                    </div>



                                    <div class="form-group">
                                        <label  class="py-1 d-block border" for="remarks">Remarks:</label>
                                        <textarea type="text" name="remarks"  id="transport_no" class="form-control" cols="5" rows="2">{{$supplier->remarks}}</textarea>
                                    </div>

                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    @if(isset($supplier->previous_advance))
                                        <div class="form-group">
                                            <label class="py-1 d-block border" for="supplier_name">Total Due:</label>
                                            <input type="text"  name="previous_advance"  value="{{-$supplier->previous_advance}}" class="form-control">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label class="py-1 d-block border" for="supplier_name">Total Due:</label>
                                            <input type="text"  name="previous_due"  value="{{$supplier->previous_due}}" class="form-control">
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label  class="py-1 d-block border" for="payment">Amount:</label>
                                        <input type="text" name="payment" value="{{$supplier->paid_amount}}" id="payment" class="form-control">
                                    </div>

                                    @if(isset($supplier->current_advance))
                                        <div class="form-group">
                                            {{-- <label  for="current_advance">Due Amount:</label> --}}
                                            <input type="hidden" name="current_advance"  value="{{-$supplier->current_advance}}" id="current_due" class="form-control">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            {{-- <label  for="current_due">Due Amount:</label> --}}
                                            <input type="hidden" name="current_due"  value="{{$supplier->current_due}}" id="current_due" class="form-control">
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 offset-4">
                                <a href="{{route('supplier.follow.index')}}" class="btn btn-primary" type="button">Cancel</a>
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
