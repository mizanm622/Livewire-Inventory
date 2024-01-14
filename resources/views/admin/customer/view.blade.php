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
                    
                    <div class="col-lg-6 col-md-6 col-sm-12">
                    
                        <h2>Customer Information   <small> Customer all information</small>  </h2>
                        <div class="customer_area">
                            <div class="logo text-center mb-3">
                                @if(empty($customer->photo))
                                    <img src="{{asset('assets/images/user.png')}}" alt="Photo" width="100" height="100" class="rounded-circle">
                                @else
                                    <img src="{{asset($customer->photo)}}" alt="Photo" width="100" height="100" class="rounded-circle">
                                @endif
                               
                                <h4>{{$customer->name}}</h4>
                                <h6>{{$customer->email}}</h6>
                            </div>
                            <div class="title text-left">
                                <p><strong>Company Name:</strong>  {{$customer->company_name}}</p>
                                <p><strong>Father Name:</strong> {{$customer->father_name}}</p>
                                <p><strong>Mobile: </strong>{{$customer->mobile}}</p>
                                <p><strong>Phone: </strong>{{$customer->phone}}</p>
                                <p><strong>NID Number: </strong>{{$customer->nid}}</p>
                                <p><strong>Date Of Birth: </strong>{{$customer->birthday}}</p>
                                <p><strong>Address: </strong>{{$customer->address}}</p>
                                <p><strong>Ledger Page No.: </strong>{{$customer->ledger_page}}</p>
                                <p><strong>Price Group: </strong>{{$customer->price_group}}</p>
                                <p><strong>Security : </strong>{{$customer->security}}</p>
                                <p><strong>Credit Limit: </strong>{{$customer->credit_limit}}/-</p>
                                <p><strong>Advance Payment: </strong>{{$customer->advance_payment}}/-</p>
                                <p><strong>Previous Due: </strong>{{$customer->previous_due}}/-</p>
                                <p><strong>Remarks: </strong>{{$customer->remarks}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>Guarantor Information   <small> Guarantor all information</small></h2>
                        <div class="guarantor_area">
                            <div class="logo text-center">
                                @if(empty($customer->guarantor_photo))
                                    <img src="{{asset('assets/images/user.png')}}" alt="Photo" width="100" height="100" class="rounded-circle">
                                @else
                                    <img src="{{asset($customer->guarantor_photo)}}" alt="Photo" width="100" height="100" class="rounded-circle">
                                @endif
                               
                                <h4>{{$customer->guarantor_name}}</h4>
                                <h6>{{$customer->guarantor_email}}</h6>
                            </div>
                            <div class="title text-left">
                                <p><strong>Company Name:</strong>  {{$customer->guarantor_company_name}}</p>
                                <p><strong>Father Name:</strong> {{$customer->guarantor_father_name}}</p>
                                <p><strong>Mobile: </strong>{{$customer->guarantor_mobile}}</p>
                                <p><strong>Phone: </strong>{{$customer->guarantor_phone}}</p>
                                <p><strong>NID Number: </strong>{{$customer->guarantor_nid}}</p>
                                <p><strong>Date Of Birth: </strong>{{$customer->guarantor_birthday}}</p>
                                <p><strong>Address: </strong>{{$customer->guarantor_address}}</p>
                                <p><strong>Security : </strong>{{$customer->guarantor_security}}</p>
                                <p><strong>Remarks: </strong>{{$customer->guarantor_remarks}}</p>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>

@endsection
