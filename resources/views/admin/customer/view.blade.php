@extends('layouts.admin')

@section('page-title')
Customer View
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="back_button mb-2">
                    <a href="{{route('customer.index')}}" class="btn btn-md btn-primary float-right">Back</a>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 offset-lg-2 offset-md-3">
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <h2 class="text-center text-dark border">customer Information</h2>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <div class="logo text-center mb-3">
                                            @if(empty($customer->photo))
                                                <img src="{{asset('assets/images/user.png')}}" alt="Photo" width="100" height="100" class="rounded-circle">
                                            @else
                                                <img src="{{asset($customer->photo)}}" alt="Photo" width="100" height="100" class="rounded-circle">
                                            @endif

                                            <h4 class="text-dark">{{$customer->name}}</h4>
                                            @if(!empty($customer->email))
                                                <h6 class="text-dark">{{$customer->email}}</h6>
                                            @endif
                                        </div>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th class="w-25 text-center">Customer Name</th>
                                        <th class="w-25 text-center">Father Name</th>
                                        <th class="w-25 text-center">Company Name</th>
                                        <th class="w-25 text-center">Address</th>
                                        <th class="w-25 text-center">Mobile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">{{$customer->name}}</td>
                                        <td class="text-center">{{$customer->father_name}}</td>
                                        <td class="text-center">{{$customer->company_name}}</td>
                                        <td class="text-center">{{$customer->address}}</td>
                                        <td class="text-center">{{$customer->mobile}}</td>

                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th class="w-25 text-center">NID Number</th>
                                        <th class="w-25 text-center">Date of Birth</th>
                                        <th class="w-25 text-center">Ledger Page No.</th>
                                        <th class="w-25 text-center">Price Group</th>
                                        <th class="w-25 text-center">Type</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">{{$customer->nid}}</td>
                                        <td class="text-center">{{$customer->birthday}}</td>
                                        <td class="text-center">{{$customer->ledger_page}}</td>
                                        <td class="text-center">{{$customer->price_group}}</td>
                                        <td class="text-center">{{$customer->type}}</td>
                                    </tr>
                                </tbody>

                                <thead>
                                    <tr>
                                        <th class="w-25 text-center">Security</th>
                                        <th class="w-25 text-center">Credit Limit</th>
                                        <th class="w-25 text-center">Previous Due</th>
                                        <th class="w-50 text-center" colspan="2">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">{{$customer->security}}</td>
                                        <td class="text-right">{{$customer->credit_limit}}/=</td>
                                        <td class="text-right">{{$customer->previous_due ?? -$customer->advance_payment}}/=</td>
                                        <td class="text-wrap" colspan="2">{{$customer->remarks}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <h2 class="text-center text-dark border">Guarantor Information</h2>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <div class="logo text-center mb-3">
                                            @if(empty($customer->guarantor_photo))
                                                <img src="{{asset('assets/images/user.png')}}" alt="Photo" width="100" height="100" class="rounded-circle">
                                            @else
                                                <img src="{{asset($customer->guarantor_photo)}}" alt="Photo" width="100" height="100" class="rounded-circle">
                                            @endif

                                            <h4 class="text-dark">{{$customer->guarantor_name}}</h4>
                                            @if(!empty($customer->email))
                                                <h6 class="text-dark">{{$customer->guarantor_email}}</h6>
                                            @endif
                                        </div>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th class="w-25 text-center">Guarantor Name</th>
                                        <th class="w-25 text-center">Father Name</th>
                                        <th class="w-25 text-center">Company Name</th>
                                        <th class="w-25 text-center">Address</th>
                                        <th class="w-25 text-center">Mobile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">{{$customer->guarantor_name}}</td>
                                        <td class="text-center">{{$customer->father_name}}</td>
                                        <td class="text-center">{{$customer->guarantor_company_name}}</td>
                                        <td class="text-center">{{$customer->guarantor_address}}</td>
                                        <td class="text-center">{{$customer->guarantor_mobile}}</td>

                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th class="w-25 text-center">NID Number</th>
                                        <th class="w-25 text-center">Date of Birth</th>
                                        <th class="w-25 text-center">Security</th>
                                        <th class="w-50 text-center" colspan="2">Remarks</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">{{$customer->guarantor_nid}}</td>
                                        <td class="text-center">{{$customer->guarantor_birthday}}</td>
                                        <td class="text-center">{{$customer->guarantor_security}}</td>
                                        <td class="text-wrap" colspan="2">{{$customer->guarantor_remarks}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>

@endsection
