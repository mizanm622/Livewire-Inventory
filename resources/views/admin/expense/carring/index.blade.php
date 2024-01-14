@extends('layouts.admin')

@section('page-title')
Carring Expenses List
@endsection

@section('main-content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('carring.expense.create')}}" class="btn btn-md btn-primary">+Add Carring Expense</a> Carring Expenses List<small>Show carring expenses list from here</small></h2>
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
                                <th class="all">Voucher No.</th>
                                <th class="all">Transport No.</th>
                                <th class="all">Load Point</th>
                                <th class="all">Delevary Point</th>
                                <th class="all">Driver Name</th>
                                <th class="all">Payment Amount</th>
                                <th class="all">remarks</th>
                                <th class="all">Created by</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach($carring_expenses as $expense)
                                @php
                                 $total = $total+$expense->payment_amount;
                                @endphp
                                    <tr>
                                        <td>{{$expense->date}}</td>
                                        <td>{{$expense->voucher_no}}</td>
                                        <td>{{$expense->gary_number}}</td>
                                        <td>{{$expense->load_point}}/-</td>
                                        <td>{{$expense->delevary_point}}</td>
                                        <td>{{$expense->driver_name}}</td>
                                        <td class="text-right">{{$expense->payment_amount}}/-</td>
                                        <td class="text-wrap">{{$expense->remarks}}</td>
                                        <td>{{$expense->created_by}}</td>
                                        <td> <a href="{{route('carring.expense.edit',$expense->id)}}" class="btn btn-success"><i class="fa fa-edit" ></i></a> <a href="{{route('carring.expense.delete',$expense->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a></td>
                                    </tr>
                                    
                                @endforeach
                                
                            </tbody>
                            {{-- <tr class="text-center">
                                <td colspan="9 h5"> <strong>Total = </strong>{{ $total}}/-</td>
                            </tr> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
