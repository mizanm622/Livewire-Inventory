@extends('layouts.admin')

@section('page-title')
Quotation View
@endsection

@section('main-content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="back_button mb-2">
                    <a href="{{route('quotation.create')}}" class="btn btn-md btn-primary float-right">Back</a>
                </div>
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Customer Quotation Information   <small>Customer Quotation information</small></h2>
                    <div class="customer_area py-4">
                        <div class="title text-justify">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 offset-1">
                                    <h4 class="x_title text-center">Customer Quotation Info</h4>

                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr><th class="text-right">Name: <td>{{$quotation->customer->name}}</td></th></tr>
                                            <tr><th class="text-right">Company Name: <td>{{$quotation->customer->company_name}}</td></th></tr>
                                            <tr><th class="text-right">Mobile: <td>{{$quotation->customer->mobile}}</td></th></tr>
                                            <tr><th class="text-right">Address: <td class="text-wrap">{{$quotation->customer->address}}</td></th></tr>
                                            <tr><th class="text-right">Remarks: <td class="text-wrap">{{$quotation->remarks}}</td></th></tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 offset-1">
                                    <h4 class="x_title text-center">Product Info</h4>
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr><th class="text-right">Date: <td>{{date('d-m-Y',strtotime($quotation->date))}}</td></th></tr>
                                            <tr><th class="text-right">Product Name: <td >{{$quotation->product->name}}</td></th></tr>
                                            <tr><th class="text-right">Brand: <td >{{$quotation->brand->name}}</td></th></tr>
                                            <tr><th class="text-right">Group: <td >{{$quotation->productGroup->name}}</td></th></tr>
                                            <tr><th class="text-right">Quantity: <td >{{$quotation->quantity}} Pcs/Bags</td></th></tr>
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
