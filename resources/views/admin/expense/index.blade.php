@extends('layouts.admin')

@section('page-title')
Expenses List
@endsection

@section('main-content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('expense.create')}}" class="btn btn-md btn-primary">+Add Expense</a> Expenses List<small>Show expenses list from here</small></h2>
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
                                <th class="all">Date</th>
                                <th class="all">Category</th>
                                <th class="all">Reference N0.</th>
                                <th class="all">Account</th>
                                <th class="all">Amount</th>
                                <th class="all">Note</th>
                                <th class="all">Created by</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach($expenses as $expense)
                                @php
                                 $total = $total+$expense->amount;
                                @endphp
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$expense->date}}</td>
                                        <td>{{$expense->expense_category->name}}</td>
                                        <td>{{$expense->reference_no}}</td>
                                        <td>{{$expense->account}}</td>
                                        <td class="text-right">{{$expense->amount}}/-</td>
                                        <td class="text-wrap">{{$expense->note}}</td>
                                        <td>{{$expense->created_by}}</td>
                                        <td> <a href="{{route('expense.edit',$expense->id)}}" class="btn btn-success"><i class="fa fa-edit" ></i></a> <a href="{{route('expense.delete',$expense->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a></td>
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
