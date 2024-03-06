@extends('layouts.admin')

@section('page-title')
Sales List
@endsection

@section('main-content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('live.sales.create')}}" class="btn btn-md btn-primary">+Add New Sales</a> Sales List<small>Show Sales list from here</small></h2>
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
                        <form action="{{route('sales.search')}}" method="post" data-parsley-validate class="form-horizontal form-label-left" >
                            @csrf
                             <div class="col-lg-12 col-md-12 col-sm-12 offset-3">
                                 <div class="row">
                                     <div class="col-lg-2 col-md-2 col-sm-6">
                                         <div class="form-group">
                                             {{-- <label class="d-block py-1 border" for="name">Start Date:</label> --}}
                                                 <input type="date" id="start_date" name="start_date"  class="form-control">
                                         </div>
                                     </div>
                                     <div class="col-lg-2 col-md-2 col-sm-6">
                                         <div class="form-group ">
                                             {{-- <label class="d-block py-1 border" for="name">End Date:</label> --}}
                                                 <input type="date" id="end_date" name="end_date"  class="form-control">
                                         </div>
                                     </div>
                                     <div class="col-lg-1 col-md-1 col-sm-6">
                                        <div class="form-group">
                                            <input type="submit" value="Search" class="form-control btn btn-success btn-sm">
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-6">
                                        <div class="form-group">
                                            <a type="button" href="{{ route('sales.index')}}" class="form-control btn btn-danger btn-sm">Reset</a>
                                        </div>
                                    </div>
                                 </div>
                             </div>

                         </form>
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                <th class="all">Date</th>
                                <th class="all">Invoice No.</th>
                                <th class="all">Customer Name</th>
                                <th class="all">Customer Address</th>
                                <th class="all">Store/Warehouse</th>
                                <th class="all">Total Value</th>
                                <th class="all">Discount</th>
                                <th class="all">Vat</th>
                                <th class="all">Carring</th>
                                <th class="all">Other Charges</th>
                                <th class="all">Total sales</th>
                                <th class="all">Payment	</th>
                                <th class="all">Due Amoun</th>
                                <th class="all">Balance</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales_customers as $sales)
                                    <tr>
                                        <td class="text-center">{{date('d-m-Y', strtotime($sales->date))}} </td>
                                        <td class="text-center">{{$sales->invoice_no}}</td>
                                        <td class="text-center">{{$sales->customer->name}}</td>
                                        <td class="text-center">{{$sales->customer->address}}</td>
                                        <td class="text-center">{{$sales->store->name}}</td>
                                        <td class="text-right">{{$sales->total_price}}/=</td>
                                        @if(empty($sales->price_discount))
                                        <td></td>
                                        @else
                                        <td class="text-center">{{$sales->price_discount}}/=</td>
                                        @endif
                                        @if(empty($sales->vat))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$sales->vat}}/=</td>
                                        @endif

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
                                            <td class="text-center">{{$sales->total_price-$sales->price_discount+$sales->vat+$sales->carring+$sales->other_charge}}/=

                                                    {{-- @foreach ($sales_products as $product)

                                                        @if($sales->invoice_no == $product->invoice_no)
                                                        @else
                                                        @endif

                                                    @endforeach
                                                    {{$product->product->type}} --}}
                                                </td>
                                        @if(empty($sales->payment))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$sales->payment}}/=</td>
                                        @endif

                                        @if(empty($sales->current_due))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$sales->total_price-$sales->price_discount+$sales->vat+$sales->carring+$sales->other_charge-$sales->payment}}/=</td>
                                        @endif
                                        @if(empty($sales->current_due))
                                            <td></td>
                                        @else
                                            <td class="text-right">{{$sales->current_due}}/=</td>
                                        @endif

                                        {{-- <td>{{$sales->supplier->previous_due}}</td> --}}

                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{route('sales.delete',$sales->invoice_no)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a></li>
                                                    <li><a href="{{route('sales.view',$sales->invoice_no)}}" class="btn btn-info"><i class="fa fa-eye" ></i></a></li>
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
