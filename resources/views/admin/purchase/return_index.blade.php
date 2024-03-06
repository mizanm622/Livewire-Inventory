@extends('layouts.admin')

@section('page-title')
Purchase Return List
@endsection

@section('main-content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('live.purchase.return.create')}}" class="btn btn-md btn-primary">+Add New Purchase</a> Purchase Return List<small>Show Purchase Return list from here</small></h2>
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
                                <th class="all">Company Name</th>
                                <th class="all">Address</th>
                                <th class="all">Mobile</th>
                                <th class="all">Warehouse</th>
                                <th class="all">Store</th>
                                <th class="all">Purchase Invoice</th>
                                <th class="all">Return Invoice</th>
                                <th class="all">Return Quantity</th>
                                <th class="all">Total Price</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($return_purchase_suppliers as $returnSupplier)
                                    <tr>
                                        <td>{{date('d-m-Y', strtotime($returnSupplier->purchase_date))}}</td>
                                        <td>{{date('d-m-Y', strtotime($returnSupplier->return_date))}}</td>
                                        <td>{{$returnSupplier->supplier->company_name}}</td>
                                        <td>{{$returnSupplier->supplier->address}}</td>
                                        <td>{{$returnSupplier->supplier->phone}}</td>
                                        <td>{{$returnSupplier->warehouse->name}}</td>
                                        <td>{{$returnSupplier->store->name}}</td>
                                        <td>{{$returnSupplier->purchase_invoice_no}}</td>
                                        <td>{{$returnSupplier->return_invoice_no}}</td>
                                        <td>{{$returnSupplier->total_qty}}</td>
                                        <td  class="text-right">{{$returnSupplier->total_price}}/=</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{route('purchase.return.delete',$returnSupplier->return_invoice_no)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a></li>
                                                    <li> <a href="{{route('purchase.return.view', [$returnSupplier->return_invoice_no,$returnSupplier->supplier_id])}}" class="btn btn-info"><i class="fa fa-eye" ></i></a></li>
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
