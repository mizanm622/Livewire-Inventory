
<div class="x_panel">
    <div class="x_title">
        <h2>Sales Entry<small>Add your Sales entry from here</small></h2>

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
                                                <div class="search-area col-lg-6 col-md-6 col-sm-12 text-right float-right py-3">    {{-- start supplier select area --}}
                                                    <div wire:ignore>
                                                        <label class="py-1 border" for="customer">Customer:</label>
                                                        <select class="d-block py-1 border" class="form-control" id="customer-search">
                                                            <option value="">Select Customer</option>
                                                            @foreach ($customers as $customer)
                                                                <option value="{{ $customer->id }}">
                                                                        {{$customer->name}} -
                                                                        {{$customer->address}} -
                                                                        {{$customer->mobile}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>{{--end supplier select area --}}
                                            </div>
                                            <form wire:submit.prevent="customerInfo()" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
                                                @csrf
                                                <!--Start supplier area-->
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="d-block py-1 border" for="supplier_name">Customer Name:</label>
                                                        <input type="text"  name="customer_name"    wire:model="customer_name" value="{{$customer_name}}" class="form-control">
                                                    </div>

                                                    <div class="form-group ">
                                                        <label class="d-block py-1 border"  for="date">Date:</label>
                                                            <input id="date" name="date" wire:model="date" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"  type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                                            <script>
                                                                function timeFunctionLong(input) {
                                                                    setTimeout(function() {
                                                                        input.type = 'text';
                                                                    }, 60000);
                                                                }
                                                            </script>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="d-block py-1 border"  for="prepare">Gari Number:</label>
                                                        <input type="text" name="transport_no" wire:model="transport_no" id="transport_no" class="form-control">
                                                    </div>

                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">

                                                    <div class="form-group">
                                                        <label class="d-block py-1 border"  for="transport_no">Address:</label>
                                                        <textarea type="text" name="address" id="address"   wire:model="address"  class="form-control" cols="5" rows="1"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="d-block py-1 border"  for="product_store_id">Store:</label>
                                                        <select type="text" wire:model="product_store_id" wire:change="productSearch($event.target.value)"  name="product_store_id"  class="form-control">
                                                            <option value="0">Select Option</option>
                                                            @foreach($stores as $store)
                                                                <option value="{{$store->id}}">{{$store->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="d-block py-1 border"  for="delivery_man">Delivery Man:</label>
                                                        <input type="text" name="delivery_man" id="delivery_man" wire:model="delivery_man" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="d-block py-1 border"  for="transport_no">Mobile No.:</label>
                                                        <input type="text" name="mobile" id="mobile" wire:model="mobile"  class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="d-block py-1 border"  for="invoice_no">Invoice No:</label>
                                                        <input type="text" name="invoice_no" id="invoice_no"  value="{{$last_inv_no}}"   class="form-control">
                                                    </div>
                                                    @if(isset($advance_pay))
                                                        <div class="form-group">
                                                            <label class="d-block py-1 border"  for="old_due">Advance Payment:</label>
                                                            <p class="form-control">-{{$advance_pay}}</p>

                                                        </div>
                                                    @else
                                                        <div class="form-group">
                                                            <label class="d-block py-1 border" for="old_due">Previous Due:</label>
                                                            <input type="number" name="old_due" wire:model="previous_due"  class="form-control">
                                                        </div>
                                                    @endif

                                                </div>

                                                <!--End supplier area-->

                                                <!--Start Search Product area-->
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="search-area col-lg-7 col-md-7 col-sm-12 text-right float-right  py-3">  {{-- start product select area --}}
                                                        <div wire:ignore.self>
                                                            <label class="py-1 border" for="product">Product:</label>
                                                            <select class="form-control text-center" id="product-search">
                                                                <option class="text-left" value="">Select Products</option>
                                                                @if(isset($products))
                                                                    @foreach ($products as $product)
                                                                        <option class="text-left p-2" value="{{$product->product_id}}">
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
                                                                <th class="all w-25">Code</th>
                                                                <th class="all w-25">Name</th>
                                                                <th class="all w-25">Quantity</th>
                                                                <th class="all w-25">Discount</th>
                                                                <th class="all w-25">Sales(Q)</th>
                                                                <th class="all w-25">Rate</th>
                                                                <th class="all w-25">Sub Total</th>
                                                                <th class="all w-25">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php
                                                            $type = 0;
                                                            $total_sales = 0;
                                                            $total_price = 0;
                                                            $total_qty = 0;
                                                            $discount = 0;
                                                            $items = 0;
                                                        @endphp
                                                        @if(Cart::instance('salse')->count() == 0)

                                                        @else
                                                            @forelse (Cart::instance('salse')->content() as $product)
                                                                @php
                                                                    $total_price+=($product->qty-$product->options->discount) * $product->price;
                                                                    $total_sales+=$product->qty-$product->options->discount;
                                                                    $type=$product->options->type;
                                                                    $total_qty+=$product->qty;
                                                                    $discount+=$product->options->discount;
                                                                    $items ++;
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
                                                                    <td class="text-right">{{$product->price*($product->qty-$product->options->discount)}}/-</td>
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
                                                                <td colspan="2" class="text-right p-0"><strong> Total =</strong> {{$total_qty}} {{ $type }}</td>
                                                                <td colspan="1" class="text-right p-0"><strong> Total =</strong> {{$discount}} {{ $type }}</td>
                                                                <td colspan="2" class="text-right p-0"><strong> Total =</strong> {{$total_sales}} {{ $type }}</td>
                                                                <td colspan="2" class="text-right p-0"><strong> Total =</strong> {{ $total_price}}/=</td>

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
                                        <div class="col-lg-5 col-md-5 col-sm-12">
                                            <div class="input-group">
                                               <select name="brand_id" id="brand_id" wire:change="brandSearch($event.target.value)"  type="text" class="form-control">
                                                <option value="0">All Brand</option>
                                                @foreach($brands as  $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach
                                               </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" wire:model.live="search" placeholder="Search for...">
                                            </div>
                                        </div>
                                        @if(isset($products))
                                            @foreach($products as $product)
                                                <div class="col-lg-3 col-md-3 col-sm-12">
                                                    <div class="thumbnail">
                                                        <div class="image view view-first">

                                                            @if(empty($product->product->photo))
                                                                <p my-auto>Opps No Image Found!</p>
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
                                        <h4 class="m-auto py-5 text-danger">Please select a customer and store then add your necessary product from here</h4>
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
       $('#customer-search').select2();
       $('#customer-search').on('change', function (e) {
           var data = $('#customer-search').select2("val");
           @this.set('customer_search', data);
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
