@extends('layouts.admin')

@section('page-title')
Purchase List
@endsection

@section('main-content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('live.purchase.create')}}" class="btn btn-md btn-primary">+Add New Purchase</a> Purchase List<small>Show Purchase list from here</small></h2>
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
                                <th class="all">Invoice No.</th>
                                <th class="all">Supplier Name</th>
                                <th class="all">Supplier Address</th>
                                <th class="all">Total Value</th>
                                <th class="all">Discount</th>
                                <th class="all">Vat</th>
                                <th class="all">Carring</th>
                                <th class="all">Other Charges</th>
                                <th class="all">Total Purchase</th>
                                <th class="all">Payment	</th>
                                <th class="all">Due Amoun</th>
                                <th class="all">Balance</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchase_suppliers as $purchase)
                               
                                    <tr>
                                        <td class="text-center">{{date('d-m-Y', strtotime($purchase->date))}}</td>
                                        <td class="text-center">{{$purchase->invoice_no}}</td>
                                        <td class="text-center">{{$purchase->supplier->company_name}}</td>
                                        <td class="text-center">{{$purchase->supplier->address}}</td>
                                        <td class="text-right">{{$purchase->total_price}}/=</td>
                                        <td class="text-center">{{$purchase->product_discount}} Pcs/Bags</td>
                                        <td class="text-right">{{$purchase->vat}}/=</td>
                                        @if(empty($purchase->carring))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$purchase->carring}}/=</td>
                                        @endif 
                                        @if(empty($purchase->other_charge))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$purchase->other_charge}}/=</td>
                                        @endif
                                            <td class="text-center">{{$purchase->total_qty}} Pcs/Bags</td>
                                            <td class="text-right">{{$purchase->payment}}/=</td>
                                        @if(empty($purchase->current_due))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$purchase->current_due}}/=</td>
                                        @endif
                                        @if(empty($purchase->current_due))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$purchase->current_due}}/=</td>
                                        @endif
                                       
                                        {{-- <td>{{$purchase->supplier->previous_due}}</td> --}}
                                        
                                        <td> 
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{route('purchase.edit',$purchase->id)}}" class="btn btn-success"><i class="fa fa-edit" ></i></a></li>
                                                    <li><a href="{{route('purchase.delete',$purchase->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a></li>
                                                    <li><a href="{{route('purchase.view',$purchase->invoice_no)}}" class="btn btn-info"><i class="fa fa-eye" ></i></a></li>
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
