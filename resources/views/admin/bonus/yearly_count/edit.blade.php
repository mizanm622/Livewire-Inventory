@extends('layouts.admin')

@section('page-title')
Yearly Bonus Update
@endsection

@section('main-content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Update Yearly Bonus Count<small>Update your Yearly Bonus Count List from here</small></h2>
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
                <form action="{{route('yearly.bonus.update')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="row">
                        <div class="collection-form-area">
                            <div class="x_title">
                               <h4 class="text-center">Yearly Bonus Counting List</h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 py-4">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 offset-lg-4">
                                            <div class="customer-search-area ">
                                                <div class="form-group">
                                                    <select type="search" class="form-control" id="supplier_id" name="company_name">
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{$supplier->id}}" @if($bonus_list->supplier_id == $supplier->id) selected @endif>{{$supplier->company_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">101(Ton):</label>
                                            <input type="number"  name="ton_101"   value="{{$bonus_list->ton_101}}" class="form-control">
                                            <input type="hidden"  name="id"   value="{{$bonus_list->id}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">120(Ton):</label>
                                            <input type="number"  name="ton_120"  value="{{$bonus_list->ton_120}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_101_to_ton_120_rate"  value="{{$bonus_list->ton_101_to_ton_120_rate}}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">121(Ton):</label>
                                            <input type="number"  name="ton_121"   value="{{$bonus_list->ton_121}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">130(Ton):</label>
                                            <input type="number"  name="ton_130"  value="{{$bonus_list->ton_130}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_121_to_ton_130_rate"  value="{{$bonus_list->ton_121_to_ton_130_rate}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">131(Ton):</label>
                                            <input type="number"  name="ton_131"   value="{{$bonus_list->ton_131}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">140(Ton):</label>
                                            <input type="number"  name="ton_140"  value="{{$bonus_list->ton_140}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_131_to_ton_140_rate"  value="{{$bonus_list->ton_131_to_ton_140_rate}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">141(Ton):</label>
                                            <input type="number"  name="ton_141"   value="{{$bonus_list->ton_141}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">150(Ton):</label>
                                            <input type="number"  name="ton_150"  value="{{$bonus_list->ton_150}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_141_to_ton_150_rate"  value="{{$bonus_list->ton_141_to_ton_150_rate}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">151(Ton):</label>
                                            <input type="number"  name="ton_151"   value="{{$bonus_list->ton_151}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">160(Ton):</label>
                                            <input type="number"  name="ton_160"  value="{{$bonus_list->ton_160}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_151_to_ton_160_rate"  value="{{$bonus_list->ton_151_to_ton_160_rate}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">161(Ton):</label>
                                            <input type="number"  name="ton_161"   value="{{$bonus_list->ton_161}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">170(Ton):</label>
                                            <input type="number"  name="ton_170"  value="{{$bonus_list->ton_170}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_161_to_ton_170_rate"  value="{{$bonus_list->ton_161_to_ton_170_rate}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">171(Ton):</label>
                                            <input type="number"  name="ton_171"   value="{{$bonus_list->ton_171}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">180(Ton):</label>
                                            <input type="number"  name="ton_180"  value="{{$bonus_list->ton_180}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_171_to_ton_180_rate"  value="{{$bonus_list->ton_171_to_ton_180_rate}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">181(Ton):</label>
                                            <input type="number"  name="ton_181"   value="{{$bonus_list->ton_181}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">190(Ton):</label>
                                            <input type="number"  name="ton_190"  value="{{$bonus_list->ton_190}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_181_to_ton_190_rate"  value="{{$bonus_list->ton_181_to_ton_190_rate}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">191(Ton):</label>
                                            <input type="number"  name="ton_191"   value="{{$bonus_list->ton_191}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">200(Ton):</label>
                                            <input type="number"  name="ton_200"  value="{{$bonus_list->ton_200}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_191_to_ton_200_rate"  value="{{$bonus_list->ton_191_to_ton_200_rate}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="10_ton">201(Ton):</label>
                                            <input type="number"  name="ton_201"   value="{{$bonus_list->ton_201}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="20_ton">210(Ton):</label>
                                            <input type="number"  name="ton_210"  value="{{$bonus_list->ton_210}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label for="mobile">Bonus Rate:</label>
                                            <input type="number"  name="ton_201_to_ton_210_rate"  value="{{$bonus_list->ton_201_to_ton_210_rate}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-12 col-sm-12 text-center">
                            <a href="{{route('yearly.bonus.index')}}" class="btn btn-primary" type="button">Cancel</a>
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
    var path = "{{ route('yearly.supplier.search') }}";
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



