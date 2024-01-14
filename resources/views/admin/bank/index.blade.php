@extends('layouts.admin')

@section('page-title')
Bank List
@endsection

@section('main-content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('bank.create')}}" class="btn btn-md btn-primary">+Add Bank</a> Bank List<small>Show bank list from here</small></h2>
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
                                <th class="all">Bank Code</th>
                                <th class="all">Bank Name</th>
                                <th class="all">Branch Name</th>
                                <th class="all">Account No.</th>
                                <th class="all">Bank Title</th>
                                <th class="all">Remarks</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banks as $bank)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$bank->id}}</td>
                                        <td>{{$bank->code}}</td>
                                        <td>{{$bank->name}}</td>
                                        <td>{{$bank->branch}}</td>
                                        <td>{{$bank->account_no}}</td>
                                        <td>{{$bank->title}}</td>
                                        <td class="text-wrap">{{$bank->remarks}}</td>
                                        <td> <a href="{{route('bank.edit',$bank->id)}}" class="btn btn-success"><i class="fa fa-edit" ></i></a> <a href="{{route('bank.delete',$bank->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a></td>
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
