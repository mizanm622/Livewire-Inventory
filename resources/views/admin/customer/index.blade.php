@extends('layouts.admin')

@section('page-title')
Customer List
@endsection

@section('main-content')

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('customer.create')}}" class="btn btn-md btn-primary">+Add Customer</a> Customer List<small>Show customer list from here</small></h2>
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
                                <th class="all">S.N.</th>
                                <th class="all">ID</th>
                                <th class="all">Customer Name</th>
                                <th class="all">Address</th>
                                <th class="all">Phone</th>
                                <th class="all">Ledger Page</th>
                                <th class="all">Price Group</th>
                                <th class="all">Type</th>
                                <th class="all">Credit Limit</th>
                                <th class="all">Total Sales</th>
                                <th class="all">Return</th>
                                <th class="all">Discount</th>
                                <th class="all">Carring</th>
                                <th class="all">Payment</th>
                                <th class="all">Balance</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$customer->id}}</td>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->address}}</td>
                                        <td>{{$customer->mobile}}</td>
                                        <td>{{$customer->ledger_page}}</td>
                                        <td>{{$customer->priceGroup->name}}</td>
                                        <td>{{$customer->type}}</td>
                                        @if(empty($customer->credit_limit))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$customer->credit_limit}}/=</td>
                                        @endif
                                        @if(empty($customer->total_sales))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$customer->total_sales}}/=</td>
                                        @endif
                                        @if(empty($customer->return))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$customer->return}}/=</td>
                                        @endif
                                        @if(empty($customer->discount))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$customer->discount}}/=</td>
                                        @endif
                                        @if(empty($customer->carring))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$customer->carring}}/=</td>
                                        @endif
                                        @if(empty($customer->advance_payment))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$customer->advance_payment}}/=</td>
                                        @endif
                                        @if(!empty($customer->advance_payment))
                                            <td class="text-right">-{{$customer->advance_payment}}/=</td>
                                        @else
                                            <td class="text-right">{{$customer->previous_due}}/=</td>
                                        @endif
                                        <td>
                                            <div class="btn-group btn-group-vertical">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu w-25 h-25" role="menu">
                                                    <li><a href="{{route('customer.edit',$customer->id)}}" class="btn btn-success btn-sm w-20"><i class="fa fa-edit" ></i></a></li>
                                                    <li><a href="{{route('customer.delete',$customer->id)}}" class="btn btn-danger btn-sm w-20" id="delete"><i class="fa fa-trash" ></i></a></li>
                                                    <li><a href="{{route('customer.view',$customer->id)}}" class="btn btn-info btn-sm w-20"><i class="fa fa-eye" ></i></a></li>
                                                    <li><a href="{{route('customer.ledger',$customer->id)}}" class="btn btn-info btn-sm w-20"><i class="fa fa-book" ></i></a></li>
                                                    <li><a href="{{route('customer.statement',$customer->id)}}" class="btn btn-info btn-sm w-20"><i class="fa fa-tasks" ></i></a></li>
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
