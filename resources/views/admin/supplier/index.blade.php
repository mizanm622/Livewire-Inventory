@extends('layouts.admin')

@section('page-title')
Supplier List
@endsection

@section('main-content')

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('supplier.create')}}" class="btn btn-md btn-primary">+Add Supplier</a> Supplier List<small>Show supplier list from here</small></h2>
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
                                <th class="all">S.N.</th>
                                <th class="all">ID</th>
                                <th class="all">Company Name</th>
                                <th class="all">Address</th>
                                <th class="all">Mobile</th>
                                <th class="all">Ledger Page</th>
                                <th class="all">Credit Limit</th>
                                <th class="all">Purches</th>
                                <th class="all">Return</th>
                                <th class="all">Discount</th>
                                <th class="all">Carring</th>
                                <th class="all">Payment</th>
                                <th class="all">Balance</th>
                                <th class="all">Status</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$supplier->id}}</td>
                                        <td>{{$supplier->company_name}}</td>
                                        <td>{{$supplier->address}}</td>
                                        <td>{{$supplier->mobile}}</td>
                                        <td>{{$supplier->ledger_page}}</td>
                                        @if(empty($supplier->credit_limit))
                                        <td></td>
                                        @else
                                        <td class="text-right">{{$supplier->credit_limit}}/=</td>
                                        @endif
                                        @if(empty($supplier->purches))
                                        <td></td>
                                        @else
                                        <td class="text-right">{{$supplier->purches}}/=</td>
                                        @endif
                                        @if(empty($supplier->return))
                                        <td></td>
                                        @else
                                        <td class="text-right">{{$supplier->return}}/=</td>
                                        @endif
                                        @if(empty($supplier->discount))
                                        <td></td>
                                        @else
                                        <td class="text-right">{{$supplier->discount}}/=</td>
                                        @endif
                                        @if(empty($supplier->carring))
                                        <td></td>
                                        @else
                                        <td class="text-right">{{$supplier->carring}}/=</td>
                                        @endif
                                        @if(empty($supplier->advance_payment))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$supplier->advance_payment}}/=</td>
                                        @endif
                                        @if($supplier->previous_due != NULL)
                                        <td class="text-right">{{$supplier->previous_due}}/=</td>
                                        @else
                                        <td class="text-right">-{{$supplier->advance_payment}}/=</td>
                                        @endif
                                        <td class="text-center">{!!$supplier->status == 1 ? '<a href="'.route('supplier.status',[$supplier->id,$supplier->status]).'"><i class="fa fa-check-circle text-success" style="font-size:24px"></i></a>  ':'<a href="'.route('supplier.status',[$supplier->id,$supplier->status]).'"><i class="fa fa-times-circle text-danger" style="font-size:24px"></i></a> ' !!}</td>
                                        <td>
                                            <div class="btn-group btn-group-vertical">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu h-25" role="menu">
                                                    <li> <a href="{{route('supplier.edit',$supplier->id)}}" class="btn btn-success w-20"><i class="fa fa-edit" ></i></a></li>
                                                    <li> <a href="{{route('supplier.delete',$supplier->id)}}" class="btn btn-danger w-20" id="delete"><i class="fa fa-trash" ></i></a></li>
                                                    <li><a href="{{route('supplier.view',$supplier->id)}}" class="btn btn-info w-20"><i class="fa fa-eye" ></i></a></li>
                                                    <li><a href="{{route('supplier.ledger',$supplier->id)}}" class="btn btn-info w-20"><i class="fa fa-book" ></i></a></li>
                                                    <li><a href="{{route('supplier.statement',$supplier->id)}}" class="btn btn-info w-20"><i class="fa fa-tasks" ></i></a></li>
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
