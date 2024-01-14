<div>


    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Supplier Follow Update <small>Add your Supplier Follow Update from here</small></h2>
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
                    <form wire:submit.prevent="storeSupplierFollowUpdate()"  enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="supplier-search-area ">
                                        <div class="form-group" wire:ignore>
                                            <select type="search"  name="supplier_search" id="follow-supplier-search"   placeholder="search" class="form-control">
                                                <option value=""></option>
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}">
                                                        {{$supplier->company_name}} |
                                                        {{$supplier->address}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="collection-form-area">
                                    <div class="col-lg-1 col-md-1 col-sm-12">
    
                                        <div class="form-group">
                                            <label for="supplier_id">Supplier ID:</label>
                                            <input type="text"  name="supplier_id"   wire:model="supplier_id" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="form-group">
                                            <label for="supplier_name">Supplier Name:</label>
                                            <input type="text"  name="company_name"   wire:model="company_name" class="form-control">
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12">
    
                                        <div class="form-group">
                                            <label for="supplier_name">Address:</label>
                                            <input type="text"  name="address"  wire:model="address" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="form-group">
                                            <label for="supplier_name">Mobile:</label>
                                            <input type="text"  name="mobile"  wire:model="mobile" class="form-control">
                                        </div>
                                       
                                    </div>
                                    
                                    <div class="col-lg-1 col-md-1 col-sm-12">
                                        <div class="form-group">
                                            <label for="supplier_name">Total Due:</label>
                                            <input type="text"  name="previous_due" readonly value="{{  $previous_due ?? -$advance_payment  }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="form-group ">
                                            <label class="" for="date">Paying Date:</label>
                                                <input type="date" id="date" name="date" wire:model="date" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                                <script>
                                                    function timeFunctionLong(input) {
                                                        setTimeout(function() {
                                                            input.type = 'text';
                                                        }, 60000);
                                                    }
                                                </script>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-12">
                                        <div class="form-group">
                                            <label  for="prepare">Payment:</label>
                                            <input type="text" name="payment" wire:model.lazy="payment" id="payment" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-12">
    
                                        <div class="form-group">
                                            <label  for="prepare">Remarks:</label>
                                            <textarea type="text" name="remarks" wire:model="remarks" id="transport_no" class="form-control" cols="5" rows="2"></textarea>
                                        </div>
                                       
                                    </div>
                                   
                                    
                                   
                                   
                                    
                                   
                                    {{-- <div class="col-lg-1 col-md-1 col-sm-12">
                                        @if($advance_payment || empty($previous_due))
                                            <div class="form-group">
                                                <label  for="prepare">Due Amount:</label>
                                                <input type="text" name="current_due" readonly value="{{-$current_due}}" id="current_due" class="form-control">
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label  for="prepare">Due Amount:</label>
                                                <input type="text" name="current_due" readonly value="{{$current_due}}" id="current_due" class="form-control">
                                            </div>
                                        @endif
                                        
                                    </div> --}}
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-lg-12 col-md-12 col-sm-12 offset-3">
                                    <a href="{{route('supplier.follow.index')}}" class="btn btn-primary" type="button">Cancel</a>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
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
            $('#follow-supplier-search').select2();
            $('#follow-supplier-search').on('change', function (e) {
                @this.searchSupplier(e.target.value);
            });
        }); 
        </script>
        
    @endpush
    
    </div>