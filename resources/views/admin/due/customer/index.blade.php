@extends('layouts.admin')

@section('page-title')
Customer Due List
@endsection

@section('main-content')

{{-- <livewire:account.collection.edit /> --}}
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('customer.due.create')}}" class="btn btn-md btn-primary">+Add Customer Due</a> Customer Due List<small>Show customer Due list from here</small></h2>
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
                                <th class="all">SL No.</th>
                                <th class="all">Date</th>
                                <th class="all">Customer Name</th>
                                <th class="all">Address</th>
                                <th class="all">Mobile</th>
                                <th class="all">Purpose</th>
                                <th class="all">Remarks</th>
                                <th class="all">Amount</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="text-center">{{$customer->date}}</td>
                                        <td class="text-center">{{$customer->customer->name}}</td>
                                        <td>{{$customer->customer->address}}</td>
                                        <td>{{$customer->customer->mobile}}</td>
                                        <td class="text-wrap">{{$customer->purpose}}</td>
                                        <td class="text-wrap">{{$customer->remarks}}</td>
                                        <td class="text-right">{{$customer->paid_amount}}/=</td>
                                        <td> <a href="{{route('customer.due.edit',$customer->id)}}" class="btn btn-success"><i class="fa fa-edit" ></i></a> <a href="{{route('customer.due.delete',$customer->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a><a href="{{route('customer.due.view',$customer->id)}}" class="btn btn-info"><i class="fa fa-eye" ></i></a></td>
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
