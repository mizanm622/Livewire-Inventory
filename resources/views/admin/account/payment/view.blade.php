@extends('layouts.admin')

@section('page-title')
Payment View
@endsection

@section('main-content')
 
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="back_button mb-2">
                   
                    <a href="{{route('payment.index')}}" class="btn btn-md btn-primary float-right">Back</a>
                </div>
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Payment Information   <small>Supplier Payment information</small></h2>
                    <div class="customer_area py-4">
                        
                        <div class="title text-justify">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 offset-1">
                                    <h3 class="x_title text-center">Supplier Info</h3>

                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            
                                            <tr><th class="text-right">Company Name: <td>{{$supplier->supplier->company_name}}</td></th></tr>
                                            <tr><th class="text-right">Mobile: <td>{{$supplier->supplier->mobile}}</td></th></tr>
                                            <tr><th class="text-right">Address: <td class="text-wrap">{{$supplier->supplier->address}}</td></th></tr>
                                            <tr><th class="text-right">Remarks: <td class="text-wrap">{{$supplier->remarks}}</td></th></tr>
                                        </tbody>
                                    </table>
                                   
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 offset-1">
                                    <h3 class="x_title text-center">Payment Info</h3>
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr><th class="text-right">Date: <td>{{$supplier->date}}</td></th></tr>
                                            <tr><th class="text-right">Invoice No: <td>{{$supplier->invoice_no}}</td></th></tr>
                                            <tr><th class="text-right">Previous Due: <td >{{$supplier->previous_due ?? -$supplier->previous_advance}}/=</td></th></tr>
                                            <tr><th class="text-right">Paid Amount: <td >{{$supplier->paid_amount}}/=</td></th></tr>
                                            <tr><th class="text-right">Current Due: <td >{{$supplier->current_due ?? -$supplier->current_advance}}/=</td></th></tr>
                                            <tr><th class="text-right">Paying By: <td >{{$supplier->payment_by}}: {{$supplier->bank_title}}</td></th></tr>
                                        </tbody>
                                    </table>
                                   
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