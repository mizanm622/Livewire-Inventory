@extends('layouts.admin')

@section('page-title')
Supplier Follow Update List
@endsection

@section('main-content')

{{-- <livewire:account.collection.edit /> --}}
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('supplier.follow.create')}}" class="btn btn-md btn-primary">+Add Supplier Following Date </a> Supplier Following Date List</h2>
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
                                <th class="all">Supplier ID</th>
                                <th class="all">Supplier Name</th>
                                <th class="all">Address</th>
                                <th class="all">Mobile</th>
                                <th class="all">Total Due</th>
                                <th class="all">Paid Amount</th>
                                <th class="all">Paying Date</th>
                                <th class="all">Next Date</th>
                                <th class="all">Remarks</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="text-center">{{$supplier->supplier_id}}</td>
                                        <td class="text-center">{{$supplier->supplier->company_name}}</td>
                                        <td>{{$supplier->supplier->address}}</td>
                                        <td>{{$supplier->supplier->mobile}}</td>
                                        <td class="text-right">{{$supplier->current_due ?? -$supplier->current_advance}}/=</td>
                                        <td class="text-right">{{$supplier->paid_amount}}/=</td>
                                        <td class="text-center">{{date('d-m-Y',strtotime($supplier->date))}}</td>
                                        @if($supplier->next_date)
                                        <td class="text-center">{{date('d-m-Y',strtotime($supplier->next_date))}}</td>
                                        @else
                                        <td></td>
                                        @endif
                                        <td class="text-wrap">{{$supplier->remarks}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>  <a href="{{route('supplier.follow.edit',$supplier->id)}}" class="btn btn-success"><i class="fa fa-edit" ></i></a></li>
                                                    <li> <a href="{{route('supplier.follow.delete',$supplier->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a></li>
                                                    <li><a href="{{route('supplier.follow.view',$supplier->id)}}" class="btn btn-info"><i class="fa fa-eye" ></i></a></li>
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
