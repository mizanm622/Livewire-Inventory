@extends('layouts.admin')

@section('page-title')
Bonus Add
@endsection

@section('main-content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Bonus Count<small>Add your Bonus Count List from here</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="#">Settings 1</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('bonus.store')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="row">
                        <div class="collection-form-area">
                            <div class="x_title">
                               <h4 class="text-center">Monthly Bonus Counting List</h4>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 py-4">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12 offset-lg-4">
                                        <div class="customer-search-area ">
                                            <div class="form-group">
                                                <select type="search" class="form-control" id="supplier_id" name="company_name"></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">10(Ton):</label>
                                            <input type="number"  name="ton_10"   value="{{old('ton_10','default value')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12  offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">20(Ton):</label>
                                            <input type="number"  name="ton_20"  value="{{old('ton_20','default value')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12  offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_10_to_ton_20_rate"  value="{{old('ton_10_to_ton_20_rate','default value')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">21(Ton):</label>
                                            <input type="number"  name="ton_21"   value="{{old('ton_21','default value')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">30(Ton):</label>
                                            <input type="number"  name="ton_30"  value="{{old('ton_30','default value')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_21_to_ton_30_rate"  value="{{old('ton_21_to_ton_30_rate','default value')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">31(Ton):</label>
                                            <input type="number"  name="ton_31"   value="{{old('ton_31')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">40(Ton):</label>
                                            <input type="number"  name="ton_40"  value="{{old('ton_40')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_31_to_ton_40_rate"  value="{{old('ton_31_to_ton_40_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">41(Ton):</label>
                                            <input type="number"  name="ton_41"   value="{{old('ton_41')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">50(Ton):</label>
                                            <input type="number"  name="ton_50"  value="{{old('ton_50')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_41_to_ton_50_rate"  value="{{old('ton_41_to_ton_50_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">51(Ton):</label>
                                            <input type="number"  name="ton_51"  value="{{old('ton_51')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">60(Ton):</label>
                                            <input type="number"  name="ton_60"  value="{{old('ton_60')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_51_to_ton_60_rate"  value="{{old('ton_51_to_ton_60_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">61(Ton):</label>
                                            <input type="number"  name="ton_61"   value="{{old('ton_61')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">70(Ton):</label>
                                            <input type="number"  name="ton_70"  value="{{old('ton_70')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_61_to_ton_70_rate"  value="{{old('ton_61_to_ton_70_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">71(Ton):</label>
                                            <input type="number"  name="ton_71"   value="{{old('ton_71')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">80(Ton):</label>
                                            <input type="number"  name="ton_80"  value="{{old('ton_80')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_71_to_ton_80_rate"  value="{{old('ton_71_to_ton_80_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">81(Ton):</label>
                                            <input type="number"  name="ton_81"   value="{{old('ton_81')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">90(Ton):</label>
                                            <input type="number"  name="ton_90"  value="{{old('ton_90')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_81_to_ton_90_rate"  value="{{old('ton_81_to_ton_90_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">91(Ton):</label>
                                            <input type="number"  name="ton_91"   value="{{old('ton_91')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">100(Ton):</label>
                                            <input type="number"  name="ton_100"  value="{{old('ton_100')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_91_to_ton_100_rate"  value="{{old('ton_91_to_ton_100_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">101(Ton):</label>
                                            <input type="number"  name="ton_101"   value="{{old('ton_101')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">110(Ton):</label>
                                            <input type="number"  name="ton_110"  value="{{old('ton_110')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_101_to_ton_110_rate"  value="{{old('ton_101_to_ton_110_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">111(Ton):</label>
                                            <input type="number"  name="ton_111"   value="{{old('ton_111')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">120(Ton):</label>
                                            <input type="number"  name="ton_120"  value="{{old('ton_120')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_111_to_ton_120_rate"  value="{{old('ton_111_to_ton_120_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">121(Ton):</label>
                                            <input type="number"  name="ton_121"   value="{{old('ton_121')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">130(Ton):</label>
                                            <input type="number"  name="ton_130"  value="{{old('ton_130')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_121_to_ton_130_rate"  value="{{old('ton_121_to_ton_130_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">131(Ton):</label>
                                            <input type="number"  name="ton_131"   value="{{old('ton_131')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">140(Ton):</label>
                                            <input type="number"  name="ton_140"  value="{{old('ton_140')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_131_to_ton_140_rate"  value="{{old('ton_131_to_ton_140_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">141(Ton):</label>
                                            <input type="number"  name="ton_141"   value="{{old('ton_141')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">150(Ton):</label>
                                            <input type="number"  name="ton_150"  value="{{old('ton_150')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_141_to_ton_150_rate"  value="{{old('ton_141_to_ton_150_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">151(Ton):</label>
                                            <input type="number"  name="ton_151"   value="{{old('ton_151')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">160(Ton):</label>
                                            <input type="number"  name="ton_160"  value="{{old('ton_160')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_151_to_ton_160_rate"  value="{{old('ton_151_to_ton_160_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">161(Ton):</label>
                                            <input type="number"  name="ton_161"   value="{{old('ton_161')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">170(Ton):</label>
                                            <input type="number"  name="ton_170"  value="{{old('ton_170')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_161_to_ton_170_rate"  value="{{old('ton_161_to_ton_170_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">171(Ton):</label>
                                            <input type="number"  name="ton_171"   value="{{old('ton_171')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">180(Ton):</label>
                                            <input type="number"  name="ton_180"  value="{{old('ton_180')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_171_to_ton_180_rate"  value="{{old('ton_171_to_ton_180_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">181(Ton):</label>
                                            <input type="number"  name="ton_181"   value="{{old('ton_181')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">190(Ton):</label>
                                            <input type="number"  name="ton_190"  value="{{old('ton_190')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_181_to_ton_190_rate"  value="{{old('ton_181_to_ton_190_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">191(Ton):</label>
                                            <input type="number"  name="ton_191"   value="{{old('ton_191')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">200(Ton):</label>
                                            <input type="number"  name="ton_200"  value="{{old('ton_200')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_191_to_ton_200_rate"  value="{{old('ton_191_to_ton_200_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">201(Ton):</label>
                                            <input type="number"  name="ton_201"   value="{{old('ton_201')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">210(Ton):</label>
                                            <input type="number"  name="ton_210"  value="{{old('ton_210')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_201_to_ton_210_rate"  value="{{old('ton_201_to_ton_210_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-12 col-sm-12 text-center">
                            <a href="{{route('bonus.index')}}" class="btn btn-primary" type="button">Cancel</a>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script type="text/javascript">
    var path = "{{ route('supplier.search') }}";
    $('#supplier_id').select2({
        placeholder: 'Select a Supplier',
        ajax: {
          url: path,
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.company_name,
                        id: item.id
                    }
                })
            };
          },
          cache: true
        }
      });

</script>
@endsection



