@extends('layouts.admin')

@section('page-title')
Sales Return List
@endsection

@section('main-content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('live.sales.return.create')}}" class="btn btn-md btn-primary">+Add New Sales Return</a> Sales Return List<small>Show Sales Return list from here</small></h2>
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
                        {{-- notification message --}}
                        @if(session()->has('msg'))
                            <div class="text-center alert alert-success">
                                {{session()->get('msg')}}
                            </div>
                        @endif
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                <th class="all">Purchase Date</th>
                                <th class="all">Return Date</th>
                                <th class="all">Purchase Invoice No.</th>
                                <th class="all">Return Invoice No.</th>
                                <th class="all">Customer Name</th>
                                <th class="all">Customer Address</th>
                                <th class="all">Return Value</th>
                                <th class="all">Carring</th>
                                <th class="all">Other Charges</th>
                                <th class="all">Return Quantity</th>
                                <th class="all">Due Amoun</th>
                                <th class="all">Balance</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales_customers as $sales)

                                    <tr>
                                        <td class="text-center">{{date('d-m-Y', strtotime($sales->sales_date))}} </td>
                                        <td class="text-center">{{date('d-m-Y', strtotime($sales->return_date))}} </td>
                                        <td class="text-center">{{$sales->sales_invoice_no}}</td>
                                        <td class="text-center">{{$sales->return_invoice_no}}</td>
                                        <td class="text-center">{{$sales->customer->name}}</td>
                                        <td class="text-center">{{$sales->customer->address}}</td>
                                        <td class="text-right">{{$sales->total_price}}/=</td>
                                        @if(empty($sales->carring))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$sales->carring}}/=</td>
                                        @endif
                                        @if(empty($sales->other_charge))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$sales->other_charge}}/=</td>
                                        @endif
                                            <td class="text-center">{{$sales->total_qty}} Pcs/Bags</td>

                                            <td class="text-right">{{$sales->current_due ?? $sales->advance_payment }}/=</td>

                                            <td class="text-right">{{$sales->current_due ?? -$sales->advance_payment}}/=</td>

                                        {{-- <td>{{$sales->supplier->previous_due}}</td> --}}

                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{route('sales.return.delete',$sales->return_invoice_no)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a></li>
                                                    <li><a href="{{route('sales.return.view',$sales->return_invoice_no)}}" class="btn btn-info"><i class="fa fa-eye" ></i></a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
