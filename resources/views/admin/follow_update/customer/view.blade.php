@extends('layouts.admin')

@section('page-title')
Customer Follow Update View
@endsection

@section('main-content')
 
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="back_button mb-2">
                   
                    <a href="{{route('customer.follow.index')}}" class="btn btn-md btn-primary float-right">Back</a>
                </div>
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Customer Follow Update Information   <small>Customer Follow Update information</small></h2>
                    <div class="customer_area py-4">
                        <div class="title text-justify">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 offset-1">
                                    <h4 class="x_title text-center">Customer Info</h4>

                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr><th class="text-right">Name: <td>{{$customer->customer->name}}</td></th></tr>
                                            <tr><th class="text-right">Company Name: <td>{{$customer->customer->company_name}}</td></th></tr>
                                            <tr><th class="text-right">Mobile: <td>{{$customer->customer->mobile}}</td></th></tr>
                                            <tr><th class="text-right">Address: <td class="text-wrap">{{$customer->customer->address}}</td></th></tr>
                                            <tr><th class="text-right">Remarks: <td class="text-wrap">{{$customer->remarks}}</td></th></tr>
                                        </tbody>
                                    </table>
                                   
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 offset-1">
                                    <h4 class="x_title text-center">Follow Update Status</h4>
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr><th class="text-right">Date: <td>{{$customer->date}}</td></th></tr>
                                            <tr><th class="text-right">Total Due: <td >{{$customer->current_due ?? -$customer->current_advance}}/=</td></th></tr>
                                            <tr><th class="text-right">Paid Amount: <td >{{$customer->paid_amount}}/=</td></th></tr>
                                            <tr><th class="text-right">Paying Date: <td >{{$customer->date}}</td></th></tr>
                                            <tr><th class="text-right">Next Date: <td >{{$customer->date}}/=</td></th></tr>
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