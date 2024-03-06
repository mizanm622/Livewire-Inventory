
<div class="x_panel">
    <div class="x_title">
        <h2>Purchase Return Entry<small>Add your Purchase Return from here</small></h2>

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
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12">
                <div class="">
                    <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_panel">
                                    <div class="x_title">

                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Settings 1</a>
                                                    <a class="dropdown-item" href="#">Settings 2</a>
                                                </div>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-6">
                                                <div class="search-area col-lg-6 col-md-6 col-sm-12 text-right float-right py-3">
                                                    <div wire:ignore>
                                                        <label class="py-1 border" for="supplier_name">Supplier:</label>
                                                        <select class="form-control" id="supplier-search">
                                                            <option value="">Select Supplier</option>
                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">
                                                                        {{$supplier->company_name}}  -
                                                                        {{$supplier->address}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>{{--end supplier select area --}}
                                            </div>
                                            <form wire:submit.prevent="supplierInfo()" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
                                                @csrf
                                                <!--Start supplier area-->
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="d-block py-1 border" for="supplier_name">Supplier Name:</label>
                                                        <input type="text"  name="supplier_name"    wire:model="supplier_name" value="{{$supplier_name}}" class="form-control">
                                                    </div>

                                                    <div class="form-group ">
                                                        <label class="d-block py-1 border"  for="date">Purchase Date:</label>
                                                            <input id="date" name="date" wire:model="date"  wire:change="dateSearch($event.target.value)" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                                            <script>
                                                                function timeFunctionLong(input) {
                                                                    setTimeout(function() {
                                                                        input.type = 'text';
                                                                    }, 60000);
                                                                }
                                                            </script>
                                                    </div>

                                                    <div class="form-group">
                                                        <label  class="d-block py-1 border" for="purchase_invoice_no">Purchase Invoice No.:</label>
                                                        <input type="text" name="purchase_invoice_no" wire:model="purchase_invoice_no" id="purchase_invoice_no" class="form-control">
                                                    </div>

                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">

                                                    <div class="form-group">
                                                        <label class="d-block py-1 border" for="transport_no">Address:</label>
                                                        <textarea type="text" name="address" id="address"   wire:model="address"  class="form-control" cols="5" rows="1"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="d-block py-1 border" class="" for="product_store_name">Store:</label>
                                                        <input type="text" name="product_store_name" id="product_store_name" wire:model="product_store_name" class="form-control">

                                                    </div>

                                                    <div class="form-group">
                                                        <label class="d-block py-1 border" for="warehouse_name">Warehouse:</label>
                                                        <input type="text" name="warehouse_name" id="warehouse_name" wire:model="warehouse_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="d-block py-1 border" for="transport_no">Mobile No.:</label>
                                                        <input type="text" name="mobile" id="mobile" wire:model="mobile"  class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="d-block py-1 border" for="invoice_no">Return Invoice No:</label>
                                                        <input type="text" name="invoice_no" id="invoice_no"  value="{{$return_invoice_no}}"   class="form-control">
                                                    </div>

                                                        <div class="form-group">
                                                            <label class="d-block py-1 border" for="remarks">Remarks:</label>
                                                            <textarea class="form-control" wire:model="remarks" cols="5" rows="1"></textarea>
                                                        </div>



                                                </div>

                                                <!--End supplier area-->

                                                <!--Start Search Product area-->
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="search-area col-lg-7 col-md-7 col-sm-12 text-right float-right  py-3">
                                                        <div wire:ignore.self>
                                                            <label class="py-1 border" for="product">Product:</label>
                                                                <select class="form-control" id="product-search">
                                                                    <option class="text-left" value="">Select Products</option>
                                                                    @if(isset($products))
                                                                        @foreach ($products as $product)
                                                                            <option class="text-left p-2" value="{{ $product->product_id }}">
                                                                                    {{$product->product->code}} -
                                                                                    {{$product->product->name}} -
                                                                                    {{$product->product_quantity}} {{$product->product->type}} -
                                                                                    {{$product->product->price_rate}}/=
                                                                            </option>
                                                                        @endforeach
                                                                        @endif
                                                                </select>
                                                        </div>
                                                    </div>{{--end product select area --}}



                                                    {{-- Cart product table --}}

                                                    <table  class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th class="all">Code</th>
                                                                <th class="all">Name</th>
                                                                <th class="all w-50">Quantity</th>
                                                                <th class="all w-50">Discount</th>
                                                                <th class="all">Purchase(Q)</th>
                                                                <th class="all w-50">Rate</th>
                                                                <th class="all">Sub Total</th>
                                                                <th class="all">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php
                                                           $total_amount = 0;
                                                            $items = 0;
                                                            $type = 0;
                                                            $purchase_total =0;
                                                            $total_qty = 0;
                                                            $discount = 0;
                                                            $items = 0;
                                                            // $type = 0;
                                                        @endphp
                                                        @if(Cart::instance('purchase_return')->count() == 0)

                                                        @else
                                                            @forelse (Cart::instance('purchase_return')->content() as $product)
                                                                @php
                                                                    $total_qty+=$product->qty;
                                                                    $discount+=$product->options->discount;
                                                                    $type = $product->options->type;
                                                                    $purchase_total += $product->qty - $product->options->discount;
                                                                    $total_amount +=($product->qty - $product->options->discount)*$product->price;
                                                                    $items ++;
                                                                    // $type = $product->options->type;
                                                                    $id= $product->id;
                                                                @endphp
                                                                <tr class="text-center">
                                                                    <td>{{$product->options->code}}</td>
                                                                    <td>{{$product->name}}</td>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <input type="text"  wire:model="quantities" wire:change="updateQuantity({{$id}},{{$product->options->product_store_id}}, $event.target.value)" value="{{$product->qty}}"class="input-field">
                                                                            <small class="text-danger"><strong>{!!$product->options->stock == 1 ? '':'<span class="text-danger text-center">Unavailable</span>' !!}</strong></small>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <input type="text"  wire:model="discounts" wire:change="updateDiscount({{$id}}, $event.target.value)" value="{{$product->options->discount}}" class="input-field">
                                                                        </div>
                                                                    </td>
                                                                    <td>{{$product->qty-$product->options->discount}}</td>
                                                                    <td class="text-right">
                                                                        <div class="input-group">
                                                                            <input type="text"  wire:model="update_price" wire:change="updatePrice({{$id}}, $event.target.value)" value="{{$product->price}}" class="input-field">
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-right">{{$product->price*$product->qty}}/-</td>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <button type="button" class="btn btn-danger btn-sm" wire:click="itemRemove('{{$product->rowId}}')" ><i class="fa fa-trash" ></i></button>
                                                                        </div>
                                                                    </td>

                                                                </tr>

                                                            @empty
                                                                <tr>
                                                                    <h5 class="text-center">No Data Found!</h5>
                                                                </tr>
                                                            @endforelse
                                                            @endif
                                                            <tr class="text-left">
                                                                <td colspan="1"><strong> Items =</strong> {{$items}}</td>
                                                                <td colspan="1" class="text-right"><strong> Total Quantity =</strong> {{$total_qty}} {{ $type }}</td>
                                                                <td colspan="1"><strong> Total Discount =</strong> {{$discount}} {{ $type }}</td>
                                                                <td colspan="2"><strong> Total Purchase =</strong> {{$purchase_total}} {{ $type }}</td>
                                                                <td colspan="2"><strong> Total Price =</strong> {{$total_amount}}/=</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div><!--End Product area-->
                                                <div class="form-group">
                                                    <div class="input-group col-md-4">
                                                        <button type="button" wire:click="canceal" class="btn btn-danger btn-md">Cancel</button>
                                                    </div>
                                                    <div class="input-group col-md-4">
                                                        <input type="submit" value="Checkout" class="btn btn-primary btn-md">
                                                    </div>
                                                    <div class="input-group col-md-4">
                                                        <a type="button" href="{{url('/dashboard')}}" class="btn btn-info btn-md">Hold</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    {{-- <div class="col-md-4 col-sm-3">
                                        <div class="input-group">
                                           <select name="brand_id" id="brand_id" wire:change="brandSearch($event.target.value)"  type="text" class="form-control">
                                            <option value="0">All Brand</option>
                                            @foreach($brands as  $brand)
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                           </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-3 form-group pull-right">
                                        <div class="input-group">
                                            <input type="text" class="form-control" wire:model.live="search" placeholder="Search for...">
                                        </div>
                                    </div> --}}
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        @if(isset($products))
                                            @foreach($products as $product)
                                                <div class="col-lg-3 col-md-3 col-sm-12">
                                                    <div class="thumbnail">
                                                        <div class="image view view-first">

                                                            @if(empty($product->product->photo))
                                                                <h5 my-auto>Opps No Image Found!</h5>
                                                            @else
                                                                <img style="width: 100%; display: block;" src="{{asset($product->product->photo)}}" alt="image" />
                                                            @endif
                                                            <form wire:submit.prevent="sessionStore({{$product->product->id}})" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="mask">
                                                                        <p>
                                                                        {{-- <button type="submit" class="add-btn"><i class="fa fa-plus"></i></button> --}}
                                                                        <strong>৳.{{$product->product->price_rate}}/=</strong>
                                                                        <span class="text-wrap">{{$product->product->name}}</span>
                                                                        <span class="badge badge-info text-light">Qty:{{$product->product_quantity}}</span>
                                                                        </p>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                        <div class="caption">
                                                            @if(empty($product->product->brand_id))
                                                            @else
                                                                <small>{{$product->product->brand->name}}</small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                        <h4 class="m-auto py-5 text-danger">Please select a supplier and purchase date then add your necessary product from here</h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
       $('#supplier-search').select2();
       $('#supplier-search').on('change', function (e) {
           var data = $('#supplier-search').select2("val");
           @this.set('supplier_search', data);
       });
    });

    $(document).ready(function () {
       $('#product-search').select2();
       $('#product-search').on('change', function (e) {
        @this.sessionStore(e.target.value);
           //var data = $('#product-search').select2("val");
           //@this.set('product_search', data);
       });
    });
    </script>
@endpush
