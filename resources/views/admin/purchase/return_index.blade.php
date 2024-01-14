@extends('layouts.admin')

@section('page-title')
Purchase Return List
@endsection

@section('main-content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('purchase.return.create')}}" class="btn btn-md btn-primary">+Add New Purchase</a> Purchase Return List<small>Show Purchase Return list from here</small></h2>
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
                                <th class="all">Date</th>
                                <th class="all">Purchase Code</th>
                                <th class="all">Return Code</th>
                                <th class="all">Status</th>
                                <th class="all">Reference No.</th>
                                <th class="all">Supplier Name</th>
                                <th class="all">Total</th>
                                <th class="all">Paid Payment</th>
                                <th class="all">Payment Type</th>
                                <th class="all">Created By</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($returnSuppliers as $returnSupplier)
                                    <tr>
                                        <td>{{date('d-m-Y', strtotime($returnSupplier->date))}}</td>
                                        <td>{{$returnSupplier->purchase_code}}</td>
                                        <td>{{$returnSupplier->return_code}}</td>
                                        <td>{{$returnSupplier->status}}</td>
                                        <td>{{$returnSupplier->reference_no}}</td>
                                        <td>{{$returnSupplier->company_name}}</td>
                                        <td class="text-right">{{$returnSupplier->total}}/=</td>
                                        <td class="text-right">{{$returnSupplier->amount}}/=</td>
                                        <td>{{$returnSupplier->payment_type}}</td>
                                        <td >{{$returnSupplier->created_by}}</td>
                                        <td> <a href="{{route('purchase.return.edit',$returnSupplier->id)}}" class="btn btn-success"><i class="fa fa-edit" ></i></a> <a href="{{route('purchase.return.delete',$returnSupplier->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a></td>
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