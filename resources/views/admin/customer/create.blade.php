@extends('layouts.admin')

@section('page-title')
Customer Add
@endsection

@section('main-content')
{{-- Image plugin css --}}
<link rel="stylesheet" href="{{asset('assets/css/dropify.min.css')}}" />

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Customer <small>Add your customer from here</small></h2>
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
                    <form action="{{route('customer.store')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Customer Name <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="name" name="name"  class="form-control ">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="company_name">Company Name <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="company_name" name="company_name"  class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="father_name">Father Name <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="father_name" name="father_name"  class="form-control">
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nid">NID Number<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" id="nid" name="nid"  class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="birthday" name="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="photo">Customer Photo <span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="file" id="photo" name="photo"  class="dropify form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="ledger_page">Ledger Page<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="ledger_page" name="ledger_page"  class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="price_group">Price Group<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                      <select name="price_group" id="price_group"  class="form-control">
                                        @foreach ($price_groups as $price_group)
                                        <option value="{{$price_group->id}}">{{$price_group->name}}</option>
                                       @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="security">Type<span class=""></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="type" name="type"  class="form-control">
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

                        <div class="guarantor_info">
                            <div class="clearfix"></div>
                            <!-- start accordion -->
                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                    <a class="panel-heading mb-3" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h2 class="panel-title">Add Guarantor <small> Add your guarantor from here</small></h2>
                                    </a>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="item form-group ">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="guarantor_name">Guarantor Name<span class=""></span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" id="guarantor_name" name="guarantor_name"  class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="item form-group ">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="guarantor_company_name">Company Name<span class=""></span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" id="guarantor_company_name" name="guarantor_company_name"  class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="item form-group ">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="guarantor_father_name">Father Name <span class=""></span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" id="guarantor_father_name" name="guarantor_father_name"  class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="item form-group ">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="guarantor_address">Address<span class=""></span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <textarea type="text" name="guarantor_address" id="guarantor_address" cols="10" rows="2"  class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="item form-group ">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="guarantor_nid">NID Number<span class=""></span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="number" id="guarantor_nid" name="guarantor_nid"  class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="item form-group ">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class=""></span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input id="guarantor_birthday" name="guarantor_birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                                            <script>
                                                                function timeFunctionLong(input) {
                                                                    setTimeout(function() {
                                                                        input.type = 'text';
                                                                    }, 60000);
                                                                }
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="item form-group ">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="guarantor_mobile">Mobile Number<span class=""></span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" id="guarantor_mobile" name="guarantor_mobile"  class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="item form-group ">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="guarantor_phone">Phone Number<span class=""></span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" id="guarantor_phone" name="guarantor_phone"  class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="item form-group ">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="guarantor_email">Email<span class=""></span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="email" id="guarantor_email" name="guarantor_email" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="item form-group ">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="guarantor_security">Security<span class=""></span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" id="guarantor_security" name="guarantor_security"  class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="item form-group ">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="guarantor_remarks">Remarks<span class=""></span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <textarea type="text" name="guarantor_remarks" id="guarantor_remarks" cols="10" rows="2"  class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="item form-group ">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="guarantor_photo">Guarantor Photo <span class=""></span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="file" id="guarantor_photo" name="guarantor_photo"  class="dropify form-control">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of accordion -->
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-12 offset-md-3 text-center">
                                <a href="{{route('customer.index')}}" class="btn btn-primary" type="button">Cancel</a>
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
