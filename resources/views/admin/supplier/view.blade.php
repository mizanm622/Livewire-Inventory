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
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Supplier Information   <small> Supplier all information</small></h2>
                    <div class="customer_area">
                        <div class="logo text-center mb-3">
                            @if(empty($supplier->photo))
                                <img src="{{asset('assets/images/user.png')}}" alt="Photo" width="100" height="100" class="rounded-circle">
                            @else
                                <img src="{{asset($supplier->photo)}}" alt="Photo" width="100" height="100" class="rounded-circle">
                            @endif
                           
                            <h4>{{$supplier->owner_name}}</h4>
                            <h6>{{$supplier->email}}</h6>
                        </div>
                        <div class="title text-justify">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <p><strong>Company Name:</strong>  {{$supplier->company_name}}</p>
                                    <p><strong>Owner Name:</strong> {{$supplier->owner_name}}</p>
                                    <p><strong>Officer Name:</strong> {{$supplier->officer_name}}</p>
                                    <p><strong>Dealer Area: </strong>{{$supplier->dealer_area}}</p>
                                    <p><strong>Dealer Code: </strong>{{$supplier->dealer_code}}</p>
                                    <p><strong>Mobile: </strong>{{$supplier->mobile}}</p>
                                    <p><strong>Phone: </strong>{{$supplier->phone}}</p>
                                    <p><strong>Email: </strong>{{$supplier->email}}</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <p><strong>Address: </strong>{{$supplier->address}}</p>
                                    <p><strong>Status: </strong>{!!$supplier->status == 1 ? '<i class="fa fa-check-circle text-success"></i>':'<i class="fa fa-times-circle text-warning"></i>'!!}</p>
                                    <p><strong>Security: </strong>{{$supplier->security}}</p>
                                    <p><strong>Ledger Page: </strong>{{$supplier->ledger_page}}</p>
                                    <p><strong>Credit Limit: </strong>{{$supplier->credit_limit}}/-</p>
                                    <p><strong>Advance Payment: </strong>{{$supplier->advance_payment}}/-</p>
                                    <p><strong>Previous Due: </strong>{{$supplier->previous_due}}/-</p>
                                    <p><strong>Remarks: </strong>{{$supplier->remarks}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
            </div>
        </div>
    </div>
</div>

@endsection
