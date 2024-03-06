@extends('layouts.admin')

@section('page-title')
Warehouse List
@endsection

@section('main-content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('warehouse.create')}}" class="btn btn-md btn-primary">+Add Warehouse</a> Warehouse List<small>Show Warehouse list from here</small></h2>
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
                                    <th class="all">Warehouse Name</th>
                                    <th class="all">Address</th>
                                    <th class="all">Mobile</th>
                                    <th class="all">Phone</th>
                                    <th class="all">Email</th>
                                    <th class="all">Description</th>
                                    <th class="all">Remarks</th>
                                    <th class="all">Status</th>
                                    <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($warehouses as $warehouse)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$warehouse->id}}</td>
                                        <td>{{$warehouse->name}}</td>
                                        <td>{{$warehouse->address}}</td>
                                        <td>{{$warehouse->mobile}}</td>
                                        <td>{{$warehouse->phone}}</td>
                                        <td>{{$warehouse->email}}</td>
                                        <td class="text-wrap">{{$warehouse->description}}</td>
                                        <td class="text-wrap">{{$warehouse->remarks}}</td>
                                        <td class="text-center">{!!$warehouse->status == 1 ? '<a href="'.route('warehouse.status',[$warehouse->id,$warehouse->status]).'"><i class="fa fa-check-circle text-success" style="font-size:24px"></i></a>  ':'<a href="'.route('warehouse.status',[$warehouse->id,$warehouse->status]).'"><i class="fa fa-times-circle text-danger" style="font-size:24px"></i></a> ' !!}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu" role="menu">
                                                  <li><a href="{{route('warehouse.edit',$warehouse->id)}}" class="btn btn-success"><i class="fa fa-edit" ></i></a> </li>
                                                  <li><a href="{{route('warehouse.delete',$warehouse->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a></li>
                                                </ul>
                                              </div>
                                            {{-- <a href="{{route('warehouse.edit',$warehouse->id)}}" class="btn btn-success"><i class="fa fa-edit" ></i></a> <a href="{{route('warehouse.delete',$warehouse->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a> <a href="{{route('warehouse.view',$warehouse->id)}}" class="btn btn-info"><i class="fa fa-eye" ></i></a> --}}
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
