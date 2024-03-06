<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Yearly Bonus Count<small>Add your Yearly Bonus Count List from here</small></h2>
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
                <form wire:submit.prevent=store()>
                    @csrf
                    <div class="row">
                        <div class="collection-form-area">
                            <div class="x_title">
                               <h4 class="text-center">Yearly Bonus Counting List</h4>
                            </div>
                            <div class="search-area">
                                <div class="col-lg-12 col-md-12 col-sm-12 py-5">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 offset-lg-4">
                                            <div class="customer-search-area">
                                            <label  class="d-block py-1 border" for="customer_search">Supplier Name:</label>
                                            <div class="form-group" wire:ignore>
                                                <select type="search" id="due_supplier_search" placeholder="search supplier" class="form-control">
                                                    <option value=""></option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{$supplier->id}}">
                                                            {{$supplier->company_name}} -
                                                            {{$supplier->address}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 com-sm-12">
                                            <div class="supplier-info-area py-2">
                                                @if($supplier_info)
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                        <p class="border border-dark p-2">ID: {{ $supplier_info->id }}</p>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                        <p class="border border-dark p-2">Name: {{$supplier_info->company_name }}</p>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                        <p class="border border-dark p-2 text-wrap">Address: {{  $supplier_info->address }}</p>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                        <p class="border border-dark p-2">Mobile: {{  $supplier_info->mobile}}</p>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="10_ton">From</label>
                                            <input type="number"  wire:model="ton_101"   value="{{old('ton_101')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="20_ton">To</label>
                                            <input type="number"  wire:model="ton_120"  value="{{old('ton_120')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12  offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="mobile">Bonus Rate:</label>
                                            <input type="number"  wire:model="ton_101_to_ton_120_rate"  value="{{old('ton_101_to_ton_120_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="10_ton">From</label>
                                            <input type="number"  wire:model="ton_121"   value="{{old('ton_121')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="20_ton">To</label>
                                            <input type="number"  wire:model="ton_130"  value="{{old('ton_130')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12  offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="mobile">Bonus Rate:</label>
                                            <input type="number"  wire:model="ton_121_to_ton_130_rate"  value="{{old('ton_121_to_ton_130_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="10_ton">From</label>
                                            <input type="number"  wire:model="ton_131"   value="{{old('ton_131')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="20_ton">To</label>
                                            <input type="number"  wire:model="ton_140"  value="{{old('ton_140')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12  offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="mobile">Bonus Rate:</label>
                                            <input type="number"  wire:model="ton_131_to_ton_140_rate"  value="{{old('ton_131_to_ton_140_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="10_ton">From</label>
                                            <input type="number"  wire:model="ton_141"   value="{{old('ton_141')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="20_ton">To</label>
                                            <input type="number"  wire:model="ton_150"  value="{{old('ton_150')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12  offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="mobile">Bonus Rate:</label>
                                            <input type="number"  wire:model="ton_141_to_ton_150_rate"  value="{{old('ton_141_to_ton_150_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="10_ton">From</label>
                                            <input type="number"  wire:model="ton_151"   value="{{old('ton_151')}}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="20_ton">To</label>
                                            <input type="number"  wire:model="ton_160"  value="{{old('ton_160')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12  offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="mobile">Bonus Rate:</label>
                                            <input type="number"  wire:model="ton_151_to_ton_160_rate"  value="{{old('ton_151_to_ton_160_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="10_ton">From</label>
                                            <input type="number"  wire:model="ton_161"   value="{{old('ton_161')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="20_ton">To</label>
                                            <input type="number"  wire:model="ton_170"  value="{{old('ton_170')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12  offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="mobile">Bonus Rate:</label>
                                            <input type="number"  wire:model="ton_161_to_ton_170_rate"  value="{{old('ton_161_to_ton_170_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="10_ton">From</label>
                                            <input type="number"  wire:model="ton_171"   value="{{old('ton_171')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="20_ton">To</label>
                                            <input type="number"  wire:model="ton_180"  value="{{old('ton_180')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12  offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="mobile">Bonus Rate:</label>
                                            <input type="number"  wire:model="ton_171_to_ton_180_rate"  value="{{old('ton_171_to_ton_180_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="10_ton">From</label>
                                            <input type="number"  wire:model="ton_181"   value="{{old('ton_181')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="20_ton">To</label>
                                            <input type="number"  wire:model="ton_190"  value="{{old('ton_190')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12  offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="mobile">Bonus Rate:</label>
                                            <input type="number"  wire:model="ton_181_to_ton_190_rate"  value="{{old('ton_181_to_ton_190_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="10_ton">From</label>
                                            <input type="number"  wire:model="ton_191"   value="{{old('ton_191')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="20_ton">To</label>
                                            <input type="number"  wire:model="ton_200"  value="{{old('ton_200')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12  offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="mobile">Bonus Rate:</label>
                                            <input type="number"  wire:model="ton_191_to_ton_200_rate"  value="{{old('ton_191_to_ton_200_rate')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="10_ton">From</label>
                                            <input type="number"  wire:model="ton_201"   value="{{old('ton_201')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="20_ton">To</label>
                                            <input type="number"  wire:model="ton_210"  value="{{old('ton_210')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12  offset-lg-1 offset-md-1">
                                        <div class="form-group">
                                            <label class="d-block py-1 border" for="mobile">Bonus Rate:</label>
                                            <input type="number"  wire:model="ton_201_to_ton_210_rate"  value="{{old('ton_201_to_ton_210_rate')}}" class="form-control">
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

@push('scripts')
<script>

    $(document).ready(function () {


        $('#due_supplier_search').select2({
        placeholder: 'Select supplier from here',
        });

        $('#due_supplier_search').on('change', function (e) {
            @this.getSupplier(e.target.value);
            // var data = $('#due_supplier_search').select2("val");
            // @this.set('company_name', data);
        });

    });

    </script>

@endpush