@extends('layouts.admin')

@section('page-title')
Yearly Bonus Count List
@endsection

@section('main-content')
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('yearly.bonus.create')}}" class="btn btn-md btn-primary">+Add Yearly Bonus Count</a> Supplier/Company Yearly Bonus List<small>Show Supplier/Company Yearly Bonus from here</small></h2>
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
                                <th class="all">SL.No.</th>
                                <th class="all">Company Name</th>
                                <th class="all">101-120 Ton Rate</th>
                                <th class="all">121-130 Ton Rate</th>
                                <th class="all">131-140 Ton Rate</th>
                                <th class="all">141-150 Ton Rate</th>
                                <th class="all">151-160 Ton Rate</th>
                                <th class="all">161-170 Ton Rate</th>
                                <th class="all">171-180 Ton Rate</th>
                                <th class="all">181-190 Ton Rate</th>
                                <th class="all">191-200 Ton Rate</th>
                                <th class="all">201-210 Ton Rate</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bonus_list as $rate)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="text-center">{{$rate->supplier->company_name}}</td>
                                        <td class="text-center">{{$rate->ton_101_to_ton_120_rate}}</td>
                                        <td class="text-center">{{$rate->ton_121_to_ton_130_rate}}</td>
                                        <td class="text-center">{{$rate->ton_131_to_ton_140_rate}}</td>
                                        <td class="text-center">{{$rate->ton_141_to_ton_150_rate}}</td>
                                        <td class="text-center">{{$rate->ton_151_to_ton_160_rate}}</td>
                                        <td class="text-center">{{$rate->ton_161_to_ton_170_rate}}</td>
                                        <td class="text-center">{{$rate->ton_171_to_ton_180_rate}}</td>
                                        <td class="text-center">{{$rate->ton_181_to_ton_190_rate}}</td>
                                        <td class="text-center">{{$rate->ton_191_to_ton_200_rate}}</td>
                                        <td class="text-center">{{$rate->ton_201_to_ton_210_rate}}</td>
                                        <td> <a href="{{route('yearly.bonus.edit',$rate->id)}}" class="btn btn-success"><i class="fa fa-edit" ></i></a> <a href="{{route('yearly.bonus.delete',$rate->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a><a href="{{route('yearly.bonus.view',$rate->id)}}" class="btn btn-info"><i class="fa fa-eye" ></i></a></td>
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
