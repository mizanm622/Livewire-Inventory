@extends('layouts.admin')

@section('page-title')
Supplier Add
@endsection

@section('main-content')
{{-- Image plugin css --}}
<link rel="stylesheet" href="{{asset('assets/css/dropify.min.css')}}" />

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Supplier <small>Add your supplier from here</small></h2>
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
                    <form action="{{route('supplier.store')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="company_name">Company Name <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="company_name" name="company_name"  class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="owner_name">Owner Name <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="owner_name" name="owner_name"  class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="officer_name">Officer Name<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="officer_name" name="officer_name"  class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Address<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea type="text" name="address" id="address" cols="10" rows="2"  class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Mobile Number<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="mobile" name="mobile"  class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone">Phone Number<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="phone" name="phone"  class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="photo">Supplier Photo <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="file" id="photo" name="photo"  class="dropify form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="ledger_page">Ledger Page<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="ledger_page" name="ledger_page"  class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="dealer_code">Dealer Code<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="dealer_code" name="dealer_code"  class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="dealer_area">Dealer Area<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="dealer_area" name="dealer_area"  class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="status">Status<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="radio" class="flat" name="status" id="status" value="1" checked=""  /> <span class="h6 pr-3">Active</span>
										<input type="radio" class="flat" name="status" id="status" value="0" /> <span class="h6">Inactive</span>
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="security">Security<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="security" name="security"  class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="credit_limit">Credit Limit<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" id="credit_limit" name="credit_limit"  class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="advance_payment">Advance Payment<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" id="advance_payment" name="advance_payment"  class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="previous_due">Previous Due<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" id="previous_due" name="previous_due"  class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="remarks">Remarks<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea type="text" name="remarks" id="remarks" cols="10" rows="2"  class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-12 offset-md-3 text-center">
                                <a href="{{route('supplier.index')}}" class="btn btn-primary" type="button">Cancel</a>
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
