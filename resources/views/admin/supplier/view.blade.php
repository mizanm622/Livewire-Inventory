@extends('layouts.admin')

@section('page-title')
Supplier View
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="back_button mb-2">
                    <a href="{{route('supplier.index')}}" class="btn btn-md btn-primary float-right">Back</a>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 offset-lg-2 offset-md-3">
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <h2 class="text-center text-dark border">Supplier Information</h2>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <div class="logo text-center mb-3">
                                            @if(empty($supplier->photo))
                                                <img src="{{asset('assets/images/user.png')}}" alt="Photo" width="100" height="100" class="rounded-circle">
                                            @else
                                                <img src="{{asset($supplier->photo)}}" alt="Photo" width="100" height="100" class="rounded-circle">
                                            @endif

                                            <h4 class="text-dark">{{$supplier->name}}</h4>
                                            @if(!empty($supplier->email))
                                                <h6 class="text-dark">{{$supplier->email}}</h6>
                                            @endif
                                        </div>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th class="w-25 text-center">Company Name</th>
                                        <th class="w-25 text-center">Owner Name</th>
                                        <th class="w-25 text-center">Officer Name</th>
                                        <th class="w-25 text-center">Dealer Area</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">{{$supplier->company_name}}</td>
                                        <td class="text-center">{{$supplier->owner_name}}</td>
                                        <td class="text-center">{{$supplier->officer_name}}</td>
                                        <td class="text-center">{{$supplier->dealer_area}}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th class="w-25 text-center">Dealer Code</th>
                                        <th class="w-25 text-center">Mobile</th>
                                        <th class="w-25 text-center">Phone</th>
                                        <th class="w-25 text-center">Email</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">{{$supplier->dealer_code}}</td>
                                        <td class="text-center">{{$supplier->mobile}}</td>
                                        <td class="text-center">{{$supplier->phone}}</td>
                                        <td class="text-center">{{$supplier->email}}</td>

                                    </tr>
                                </tbody>

                                <thead>
                                    <tr>
                                        <th class="w-25 text-center">Address</th>
                                        <th class="w-25 text-center">Status</th>
                                        <th class="w-25 text-center">Security</th>
                                        <th class="w-25 text-center">Ledger Page No.</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">{{$supplier->address}}</td>
                                        <td class="text-center">{!!$supplier->status == 1 ? '<i class="fa fa-check-circle text-success"></i>':'<i class="fa fa-times-circle text-warning"></i>'!!}</td>
                                        <td class="text-center">{{$supplier->security}}</td>
                                        <td class="text-center">{{$supplier->ledger_page}}</td>

                                    </tr>
                                </tbody>

                                <thead>
                                    <tr>

                                        <th class="w-25 text-center">Credit Limit</th>
                                        <th class="w-25 text-center">Previous Due</th>
                                        <th class="w-50 text-center" colspan="2">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">{{$supplier->credit_limit}}/=</td>
                                        <td class="text-right">{{$supplier->previous_due ?? -$supplier->advance_payment}}/=</td>
                                        <td class="text-wrap" colspan="2">{{$supplier->remarks}}</td>
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
