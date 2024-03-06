<div>


<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Customer Following Date</h2>
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
                <form wire:submit.prevent="storeCustomerFollowUpdate()"  enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="customer-search-area col-lg-4 col-md-4 col-sm-12 text-right float-right  py-3">
                                        <div class="form-group" wire:ignore>
                                            <label class="py-1 border" for="customer_search">Customer:</label>
                                            <select type="search"  name="customer_search" id="follow-customer-search"   placeholder="search" class="form-control follow-input">
                                                <option value=""></option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{$customer->id}}">
                                                        {{$customer->name}} -
                                                        {{$customer->address}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="collection-form-area">
                                <div class="col-lg-1 col-md-1 col-sm-12 p-1">

                                    <div class="form-group">
                                        <label class="py-1 d-block border follow-lebel" for="supplier_name">Customer ID:</label>
                                        <input type="text"  name="customer_id"   wire:model="customer_id" class="form-control follow-input">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12 p-1">
                                    <div class="form-group">
                                        <label class="py-1 d-block border follow-lebel" for="supplier_name">Customer Name:</label>
                                        <input type="text"  name="customer_name"   wire:model="customer_name" class="form-control follow-input">
                                    </div>


                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12 p-1">

                                    <div class="form-group">
                                        <label class="py-1 d-block border follow-lebel" for="supplier_name">Address:</label>
                                        <input type="text"  name="address"  wire:model="address" class="form-control follow-input">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12 p-1">
                                    <div class="form-group">
                                        <label class="py-1 d-block border follow-lebel" for="supplier_name">Mobile:</label>
                                        <input type="text"  name="mobile"  wire:model="mobile" class="form-control follow-input">
                                    </div>

                                </div>

                                <div class="col-lg-1 col-md-1 col-sm-12 p-1">
                                    <div class="form-group">
                                        <label class="py-1 d-block border follow-lebel" for="supplier_name">Total Due:</label>
                                        <input type="text"  name="previous_due" readonly value="{{  $previous_due ?? -$advance_payment  }}" class="form-control follow-input">
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-12 p-1">
                                    <div class="form-group ">
                                        <label class="py-1 d-block border follow-lebel" class="" for="date">Paying Date:</label>
                                            <input id="date" name="date" wire:model="date" class="date-picker form-control follow-input" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                            <script>
                                                function timeFunctionLong(input) {
                                                    setTimeout(function() {
                                                        input.type = 'text';
                                                    }, 60000);
                                                }
                                            </script>
                                    </div>

                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-12 p-1">
                                    <div class="form-group">
                                        <label class="py-1 d-block border follow-lebel" for="prepare">Payment:</label>
                                        <input type="text" name="payment" wire:model.lazy="payment" id="payment" class="form-control follow-input">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12 p-1">
                                    <div class="form-group">
                                        <label class="py-1 d-block border follow-lebel" for="prepare">Remarks:</label>
                                        <textarea type="text" name="remarks" wire:model="remarks" id="transport_no" class="form-control follow-input" cols="5" rows="2"></textarea>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 offset-4">
                                <a href="{{route('customer.follow.index')}}" class="btn btn-primary" type="button">Cancel</a>
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
        $('#follow-customer-search').select2();
        $('#follow-customer-search').on('change', function (e) {
            @this.searchCustomer(e.target.value);
        });
    });
    </script>

@endpush

</div>
