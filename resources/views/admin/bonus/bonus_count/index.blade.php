@extends('layouts.admin')

@section('page-title')
Bonus Count List
@endsection

@section('main-content')
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('bonus.create')}}" class="btn btn-md btn-primary">+Add Bonus Count</a> Supplier Bonus List<small>Show Supplier Bonus from here</small></h2>
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
                                <th class="all">10-20 Ton Rate</th>
                                <th class="all">21-30 Ton Rate</th>
                                <th class="all">31-40 Ton Rate</th>
                                <th class="all">41-50 Ton Rate</th>
                                <th class="all">51-60 Ton Rate</th>
                                <th class="all">61-70 Ton Rate</th>
                                <th class="all">71-80 Ton Rate</th>
                                <th class="all">81-90 Ton Rate</th>
                                <th class="all">91-100 Ton Rate</th>
                                <th class="all">101-110 Ton Rate</th>
                                <th class="all">111-120 Ton Rate</th>
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
                                        <td class="text-center">{{$rate->ton_10_to_ton_20_rate}}</td>
                                        <td class="text-center">{{$rate->ton_21_to_ton_30_rate}}</td>
                                        <td class="text-center">{{$rate->ton_31_to_ton_40_rate}}</td>
                                        <td class="text-center">{{$rate->ton_41_to_ton_50_rate}}</td>
                                        <td class="text-center">{{$rate->ton_51_to_ton_60_rate}}</td>
                                        <td class="text-center">{{$rate->ton_61_to_ton_70_rate}}</td>
                                        <td class="text-center">{{$rate->ton_71_to_ton_80_rate}}</td>
                                        <td class="text-center">{{$rate->ton_81_to_ton_90_rate}}</td>
                                        <td class="text-center">{{$rate->ton_91_to_ton_100_rate}}</td>
                                        <td class="text-center">{{$rate->ton_101_to_ton_110_rate}}</td>
                                        <td class="text-center">{{$rate->ton_111_to_ton_120_rate}}</td>
                                        <td class="text-center">{{$rate->ton_121_to_ton_130_rate}}</td>
                                        <td class="text-center">{{$rate->ton_131_to_ton_140_rate}}</td>
                                        <td class="text-center">{{$rate->ton_141_to_ton_150_rate}}</td>
                                        <td class="text-center">{{$rate->ton_151_to_ton_160_rate}}</td>
                                        <td class="text-center">{{$rate->ton_161_to_ton_170_rate}}</td>
                                        <td class="text-center">{{$rate->ton_171_to_ton_180_rate}}</td>
                                        <td class="text-center">{{$rate->ton_181_to_ton_190_rate}}</td>
                                        <td class="text-center">{{$rate->ton_191_to_ton_200_rate}}</td>
                                        <td class="text-center">{{$rate->ton_201_to_ton_210_rate}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{route('bonus.edit',$rate->id)}}" class="btn btn-success"><i class="fa fa-edit" ></i></a></li>
                                                    <li><a href="{{route('bonus.delete',$rate->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a></li>
                                                    <li><a href="#" class="btn btn-info"><i class="fa fa-eye" ></i></a></li>
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
