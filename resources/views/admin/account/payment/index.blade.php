@extends('layouts.admin')

@section('page-title')
Payment List
@endsection

@section('main-content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('payment.create')}}" class="btn btn-md btn-primary">+Add Payment</a> Payment List<small>Show payment list from here</small></h2>
                <ul class="nav navbar-right panel_toolbox">

                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li>
                        <a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="card-box table-responsive">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                <th class="all">Date</th>
                                <th class="all">Voucher No</th>
                                <th class="all">Supplier ID</th>
                                <th class="all">Supplier Name</th>
                                <th class="all">Address</th>
                                <th class="all">Mobile</th>
                                <th class="all">Paying By</th>
                                <th class="all">Remarks</th>
                                <th class="all">Amount</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach($payments as $supplier)
                                @php
                                    $total += $supplier->paid_amount;
                                @endphp
                                    <tr>
                                        <td class="text-center">{{date('d-m-Y', strtotime($supplier->date))}}</td>
                                        <td class="text-center">{{$supplier->invoice_no}}</td>
                                        <td class="text-center">{{$supplier->supplier_id}}</td>
                                        <td class="text-center">{{$supplier->supplier->company_name}}</td>
                                        <td>{{$supplier->supplier->address}}</td>
                                        <td>{{$supplier->supplier->mobile}}</td>
                                        <td>{{$supplier->payment_by}}:{{$supplier->bank_title}}</td>
                                        <td class="text-wrap">{{$supplier->remarks}}</td>
                                        <td class="text-right">{{$supplier->paid_amount}}/=</td>
                                        <td> <a href="{{route('payment.edit',$supplier->id)}}" class="btn btn-success"><i class="fa fa-edit" ></i></a> <a href="{{route('payment.delete',$supplier->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a><a href="{{route('payment.view',$supplier->id)}}" class="btn btn-info"><i class="fa fa-eye" ></i></a></td>
                                    </tr>
                                @endforeach

                            </tbody>
                                <tr class="text-right">
                                    <td colspan="9">Total = {{$total}}/=</td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
