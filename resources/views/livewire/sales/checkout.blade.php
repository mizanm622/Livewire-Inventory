<div class="x_panel">
    <div class="x_title">
        <h2>Checkout Page<small>Submit your order from here</small></h2>
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
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <form wire:submit.prevent="salesStore()" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <!--Start supplier area-->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h5 class="x_title text-center">Customer Info</h5>
                            @php
                                $previous_due = 0;
                            @endphp
                            @if(session()->has('customer'))
                                @foreach (Session::get('customer') as $value)
                                    @php
                                        $previous_due = $value['previous_due'];
                                        $advance_pay  = $value['advance_pay'];
                                    @endphp


                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Supplier Name</th>
                                                <th>Address</th>
                                                <th>Mobile No.</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td> {{$value['date']}}</td>
                                                <td>{{$value['customer_name']}}</td>
                                                <td>{{$value['address']}}</td>
                                                <td>{{$value['mobile']}}</td>
                                            </tr>
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th>Invoice No.</th>
                                                <th>Store</th>
                                                <th>Gari Number</th>
                                                <th>Delivery Men</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>{{$value['invoice_no']}}</td>
                                                <td>{{$value['product_store_name']}}</td>
                                                <td>{{$value['transport_no']}}</td>
                                                <td>{{$value['delivery_man']}}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <!--End supplier area-->
                        {{--Start Purchase Total Amount Area --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h5 class="x_title text-center">Products List</h5>
                            <table  class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr class="text-center">
                                        <th class="all">Code</th>
                                        <th class="all">Name</th>
                                        <th class="all">Quantity</th>
                                        <th class="all">Discount</th>
                                        <th class="all">Sales (Qty)</th>
                                        <th class="all">Price Rate</th>
                                        <th class="all">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $type = 0;
                                        $total_amount = 0;
                                        $total_sales = 0;
                                        $total_discounts = 0;
                                        $total_qty = 0;
                                    @endphp
                                    @forelse (Cart::instance('salse')->content() as $product)

                                    @php
                                       $type=$product->options->type;
                                       $total_amount+=($product->qty-$product->options->discount)*$product->price;
                                       $total_sales+=$product->qty-$product->options->discount;
                                       $total_discounts+=$product->options->discount;
                                        $total_qty+=$product->qty;
                                    @endphp
                                    <tr>
                                        <td>{{$product->options->code}}</td>
                                        <td>{{$product->name}}</td>
                                        <td class="text-right">{{$product->qty}} {{ $type }}</td>
                                        <td class="text-right">{{$product->options->discount}} {{ $type }}</td>
                                        <td class="text-right">{{$product->qty-$product->options->discount}} {{ $type }}</td>
                                        <td class="text-right">{{$product->price}}/=</td>
                                        <td class="text-right">{{($product->qty-$product->options->discount)*$product->price}}/=</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>No Product Found!</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                                <tr>
                                    <td colspan="3" class="text-right">Total = {{$total_qty}} {{ $type }}</td>
                                    <td colspan="1" class="text-right">Total = {{$total_discounts}} {{ $type }}</td>
                                    <td colspan="1" class="text-right">Total = {{$total_sales}} {{ $type }}</td>
                                    <td colspan="2" class="text-right">Total = {{$total_amount}} {{ $type }}</td>
                                </tr>
                            </table>
                            <div class="ln_solid"></div>
                            <div class="col-lg-12 col-md-12 col-sm-12 offset-md-4 offset-lg-4">
                                <div class="item form-group">
                                    <button type="button" class="btn btn-primary" wire:click="back" type="button">Back</button>
                                    <button type="button" class="btn btn-danger" wire:click="cancel" type="button">Cancel</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                        {{-- End Purchase Total Amount Area --}}
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h5 class="x_title text-center">Amount Calculation</h5>
                    <div class="px-3">

                        <table class="table table-striped table-bordered">
                            <tr class="text-right"><th>Total Sales<td>= {{$total_amount}}/=</td></th></tr>
                            {{-- <tr><th>Total Quantity<td>= {{$total_qty}}</td></th></tr> --}}
                            <tr class="text-right">
                                <th>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Discount <span class="caret"></span></button>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="form-group">
                                            <input type="text" wire:model.lazy="price_discount" class="form-control">
                                            <input type="radio"   name="discount" wire:click="discountType(1)"><span>Fix</span>
                                            <input type="radio"   name="discount" wire:click="discountType(2)"><span>%Per</span>
                                        </div>

                                    </div>
                                </div>
                                <td>= {{$total_discount}} /=</td></th>
                            </tr>
                            <tr class="text-right">
                                <th>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                            Vat <span class="caret"></span></button>
                                        <div class="dropdown-menu" role="menu">
                                            <div class="form-group">
                                                <input type="text" wire:model.lazy="vat_discount" class="form-control">
                                                <input type="radio"   name="vat" wire:click="vatType(1)"><span>Fix</span>
                                                <input type="radio"   name="vat" wire:click="vatType(2)"><span>%Per</span>
                                            </div>

                                        </div>
                                    </div>
                                    <td>= {{$total_vat}} /=</td>
                                </th>
                            </tr>
                            <tr class="text-right"><th>Carring<td> <input type="text" wire:model.lazy="carring" name="carring" class="form-control"></td></th></tr>
                            <tr class="text-right"><th>Other Charge<td> <input type="text" wire:model.lazy="other_charge" name="other_charge" class="form-control"></td></th></tr>
                            <tr class="text-right"><th>Grand Total<td>= {{$grand_total . '/=' ?? ''}}</td></th></tr>
                            @if(isset($advance_pay))
                                <tr class="text-right"><th>Previous Due<td>= -{{$advance_pay  .'/=' ?? ''}}</td></th></tr>
                                <tr class="text-right"><th>Current Due<td>= {{$grand_total-$advance_pay  .'/=' ?? ''}}</td></th></tr>
                            @else
                                <tr class="text-right"><th>Previous Due<td>= {{$previous_due  .'/=' ?? ''}}</td></th></tr>
                                <tr class="text-right"><th>Current Due<td>= {{$grand_total+$previous_due  .'/=' ?? ''}}</td></th></tr>
                            @endif
                            {{-- <tr><th>Previous Due<td>= {{$previous_due  .'/=' ?? ''}}</td></th></tr> --}}
                            {{-- <tr><th>Advance Payment<td>= {{$advance_pay  .'/=' ?? ''}}</td></th></tr> --}}

                            <tr class="text-right">
                                <th>
                                    Payment Type
                                <td>
                                @if(isset($bank_title))

                                @else
                                    <select type="text" wire:model="payment_by" wire:change="paymentSearch($event.target.value)"  name="payment_by"  class="form-control">
                                        <option value="">Select Option</option>
                                            @foreach($payment_types as $payment_type)
                                                <option value="{{$payment_type}}">{{$payment_type}}</option>
                                            @endforeach
                                    </select>

                                @endif

                                    @if(isset($bank_list))
                                        @if($bank_list == 1)
                                            <select type="text" wire:model="bank_title" wire:change="paymentSearch($event.target.value)"  name="payment_by"  class="form-control">
                                                <option value="">Select Option</option>
                                                    @foreach($banks as $bank)
                                                        <option value="{{$bank->title}}">{{$bank->title}}</option>
                                                    @endforeach
                                            </select>
                                        @elseif($bank_list == 2)

                                            <input type="text" wire:model="bank_title" class="form-control">
                                        @else
                                        @endif
                                    @endif
                                    </td>
                                </th>
                            </tr>
                            {{-- <tr><th>Current Due<td>= </td></th></tr> --}}
                            <tr class="text-right"><th>Payment<td><input type="text"  wire:model.lazy="payment" name="payment" class="form-control"></td></th></tr>
                            <tr class="text-right"><th>Due Amount<td>{{$current_due}}/=</td></th></tr>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>

